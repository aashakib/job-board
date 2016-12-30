<?php

namespace App\Listeners;

use App\Events\SendMailToAdminEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;
use App\Mail\SendMailToAdmin;

class SendMailToAdminListener
{
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
     * @param  SendMailToAdminEvent  $event
     * @return void
     */
    public function handle(SendMailToAdminEvent $event)
    {
        Mail::to($event->adminUser->email)->send(new SendMailToAdmin($event->mailData, $event->adminUser));
    }
}
