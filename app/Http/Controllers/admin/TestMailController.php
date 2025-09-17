<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Jobs\TestEmailJobs;

class TestMailController extends Controller
{
    public function sendMail()
    {
        $msg = 'Hello World From Test Mail';
        $subject = 'Test Mail';
        $separateEmail = explode(',','mehedihasan87571210@gmail.com,mehedihasan54599@gmail.com,nishabhattoficial77@gmail.com');
        $to = array_filter($separateEmail);
        TestEmailJobs::dispatch($to, $subject, $msg);
        return 'Mail Sent Successfully';

    }
}
