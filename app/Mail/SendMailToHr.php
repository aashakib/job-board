<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Auth;

class SendMailToHr extends Mailable
{
    use Queueable, SerializesModels;
    protected $request;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($request)
    {
        $this->request = $request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return
            $this->from('no-reply@job-board.dev')
                ->subject('Job Board Notification')
                ->view('emails.sendMailToHr')
                ->with([
                    'name' => Auth::user()->name,
                    'title' => $this->request['title'],
                    'description' => $this->request['description'],
                ]);
    }
}
