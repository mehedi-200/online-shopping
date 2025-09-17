<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    protected $table = 'messages';
    protected $fillable = ['sender_id','receiver_id','message','status'];

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    // Receiver Relationship
    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }
}
