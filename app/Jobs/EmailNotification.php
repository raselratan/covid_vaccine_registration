<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class EmailNotification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(
        protected $name,
        protected $email,
        protected $subject,
        protected $schedule,
        protected $venue
    )
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $toEmail = $this->email;
        $subject = $this->subject;
        $messageBody = 'Hi Mr. '.$this->name. ' Your vaccination date has been scheduled. Your date is :' .$this->schedule. ' at '. $this->venue;
    
        Mail::raw($messageBody, function ($message) use ($toEmail, $subject) {
            $message->to($toEmail)
                    ->subject($subject);
        });
    }
}
