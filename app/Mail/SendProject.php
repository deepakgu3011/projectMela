<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendProject extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $projectName;
    public $projectFilePath;

    public function __construct($projectName, $projectFilePath)
    {
        $this->projectName = $projectName;
        $this->projectFilePath = $projectFilePath;
    }

    public function build()
    {
        return $this->view('emails.send_project')
                    ->with([
                        'projectName' => $this->projectName,
                        'projectFilePath' => $this->projectFilePath
                    ])
                    ->subject('Project Request');
    }
}
