<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BondCheckReminder extends Mailable
{
    use Queueable, SerializesModels;

    protected $airlines;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($airlines)
    {
        $this->airlines = $airlines;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $airlines = $this->airlines;

        return $this->subject('Bond Check Reminder')->view('livewire.reports.reminder')->with(compact('airlines'));
    }
}
