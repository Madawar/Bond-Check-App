<?php

namespace App\Mail;

use App\Models\Airline;
use App\Models\ReportSendLog;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendReport extends Mailable
{
    use Queueable, SerializesModels;
    protected $airline;
    protected $file;
    protected $date;
    protected $real_date;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($airline_id, $file_name, $date, $real_date)
    {
        $this->airline = Airline::find($airline_id);
        $this->file = $file_name;
        $this->date = $date;
        $this->real_date = $real_date;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $airline = $this->airline;
        $date = $this->date;
        ReportSendLog::create(array(
            'airline_id' => $this->airline->id,
            'for_date' => $this->real_date,
            'send_date' => Carbon::today(),
            'filename' => basename($this->file)
        ));
        $subject = 'Bond Check For ' . $this->date;
        return $this->subject($subject)->view('livewire.reports.email')->with(compact('airline', 'date'))->attach($this->file);
    }
}
