<?php

namespace App\Listeners;

use App\Events\SendMailToHrManager;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;
use App\Mail\SendMailToHr;

class SendMailToHrManagerLinsener
{
    protected $user;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  SendMailToHrManager  $event
     * @return void
     */
    public function handle(SendMailToHrManager $event)
    {
        Mail::to($event->mailData['email'])->send(new SendMailToHr($event->mailData));
    }
}
