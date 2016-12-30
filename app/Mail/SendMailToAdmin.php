<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMailToAdmin extends Mailable
{
    use Queueable, SerializesModels;
    protected $request;
    protected $adminUser;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($request, $adminUser)
    {
        $this->request = $request;
        $this->adminUser = $adminUser;
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
                ->subject('Job Board Approval Notification')
                ->view('emails.sendMailToAdmin')
                ->with([
                    'name' => $this->adminUser->name,
                    'title' => $this->request['title'],
                    'description' => $this->request['description'],
                    'userEmail' => $this->request['email'],
                ]);
    }
}
