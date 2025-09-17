<?php

namespace App\Jobs;

use App\Mail\PasswordChangeEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class PasswordChangeEmailJobs implements ShouldQueue
{
    use Queueable;
    public $to;
    public $msg;
    public $subject;

    /**
     * Create a new job instance.
     */
    public function __construct($to, $msg, $subject)
    {
        $this->to = $to;
        $this->msg = $msg;
        $this->subject = $subject;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->to)->send(new PasswordChangeEmail($this->msg, $this->subject));
    }
}
