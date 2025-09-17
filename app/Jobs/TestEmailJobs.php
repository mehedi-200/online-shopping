<?php

namespace App\Jobs;

use App\Mail\TestMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;
use PHPUnit\Util\PHP\Job;

class TestEmailJobs implements ShouldQueue
{
    use Queueable;
    public $to;
    public $msg;
    public $subject;


    /**
     * Create a new job instance.
     */
    public function __construct($to,$msg,$subject)
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
        Mail::to($this->to)->send(new TestMail($this->msg, $this->subject));
        $this->dispatch(new TestMail($this->msg, $this->subject));
        $this->dispatch(new TestMail($this->msg, $this->subject));
        $this->dispatch(new TestMail($this->msg, $this->subject));

    }
}
