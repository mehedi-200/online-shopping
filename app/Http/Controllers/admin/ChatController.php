<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Messages;
use App\Models\replyMessages;
use App\Models\sendMessages;
use http\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Events\UserOnline;

class ChatController extends Controller
{
    public function index()
    {
        $data['activeMenu'] = 'chat';
        return view('admin.messenger.chat',$data);
    }
    public function bringUser()
    {
        $users = User::whereBetween('last_seen', [now()->subSeconds(20), now()])->get();
        $authId = auth()->id();

        $users = $users->map(function ($user) use ($authId) {
            $messages = Messages::where('sender_id', $user->id)
            ->where('receiver_id', $authId)
//            ->where('status', 'delivered')
            ->orderByDesc('created_at')
            ->get();

            // এখানে মেসেজের ডেটা সংরক্ষণ করা হচ্ছে
            $user->delivered_count = $messages->count();  // delivered_count
            $user->last_message = $messages->first()?->message ?? 'No message';  // শেষ মেসেজ
            $user->last_message_time = $messages->first()?->created_at;  // শেষ মেসেজের সময়

            return $user;
        });
        $messages = Messages::where('receiver_id', $authId)
//            ->where('status', 'delivered')
//            ->orderByDesc('created_at')
            ->get();

        return response()->json([
            'message' => 'UserOnline event broadcasted',
            'users' => $users,
            'messages' => $messages
        ]);
    }
    public function showMessage($sender_id,$receiver_id)
    {
        $messages = Messages::where(function ($query) use ($sender_id, $receiver_id) {
            $query->where('sender_id', $sender_id)
                ->where('receiver_id', $receiver_id);
        })->orWhere(function ($query) use ($sender_id, $receiver_id) {
            $query->where('sender_id', $receiver_id)
                ->where('receiver_id', $sender_id);
        })
            ->with(['sender', 'receiver'])
            ->orderByDesc('created_at')
            ->get();
        $user = User::findOrFail($receiver_id);
        if($messages->isEmpty())
        {
            return response()->json(['messages'=>'']);
        }

        return response()->json(['messages'=>$messages,'user'=>$user]);
    }
    public function sendMessage(Request $request)
    {
        $message  = $request->all();
        $user = User::find($message['receiver_id']);

        if ($user->activity_check === 'active') {
            $message['status'] = 'delivered';
        } else {
            $message['status'] = 'sent';
        }
        Messages::create($message);
        return response()->json(['messages'=>'Message sent']);
    }
    public function updateStatus(Request $request)
    {
        $validated = $request->validate([
            'receiver_id' => 'required|integer|exists:users,id',
            'sender_id' => 'required|integer|exists:users,id',
        ]);

        Messages::where('sender_id', $request->receiver_id)
            ->where('receiver_id', $request->sender_id)
            ->where('status', 'delivered')
            ->update(['status' => 'seen']);
         return response()->json(['messages'=>'Message sent']);
    }

}
