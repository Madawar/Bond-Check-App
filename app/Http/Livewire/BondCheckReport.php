<?php

namespace App\Http\Livewire;

use App\Exports\BondCheckExport;
use App\Mail\SendReport;
use App\Models\Airline;
use App\Models\BondCheck;
use App\Models\ReportSendLog;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class BondCheckReport extends Component
{
    public $airlines;
    public $airline;
    public $awb;
    public $awbs = [];
    public $date;

    public function mount($slug = null)
    {

        $this->airlines = Airline::all()->pluck('airline_name', 'id');
    }

    public function render()
    {
        return view('livewire.bond-check-report')->extends('layouts.master_layout');
    }

    public function updatedAirline()
    {
        $this->report();
    }
    public function updatedDate()
    {
        $this->report();
    }
    public function updatedAwb()
    {
        $this->report();
    }
    public function getAirlineNameProperty()
    {
        $airline = Airline::find($this->airline);
        if ($airline) {
            return $airline->airline_name;
        } else {
            return null;
        }
    }
    public function getReportProperty()
    {
        $log = ReportSendLog::where('for_date', $this->date)->where('airline_id', $this->airline)->get();
        if ($log) {
            return $log;
        } else {
            return null;
        }
    }
    public function report()
    {
        $query = BondCheck::query();
        $query->when($this->date, function ($q, $filter) {
            return $q->where('date_captured', $this->date);
        });
        $query->when($this->airline, function ($q, $filter) {
            return $q->where('airline_id', $this->airline);
        });
        $query->when($this->awb, function ($q, $filter) {
            return $q->where('awb_no', $this->awb);
        });
        $query->orderby('airline_id', 'desc')->orderBy('date_captured', 'desc')->orderby('location', 'desc')->orderBy('awb_no', 'desc');
        $this->awbs = $query->get();
    }

    public function generatePdf()
    {
        $airline = Airline::find($this->airline);
        $rrdate = Carbon::parse($this->date);
        $date = Carbon::parse($this->date)->format('dMy');
        $date_formatted = Carbon::parse($this->date)->format('d-M-y');
        if ($airline) {
            $for = $airline->airline_name;
        } else {
            $for = 'Several Airlines';
        }
        $awbs = $this->awbs;
        $file_name =  $for . 'BondCheck-' . $date . '-' . Str::random(4) . '.pdf';
        $pdf = PDF::loadView('livewire.reports.report', compact('awbs', 'for', 'date_formatted'))->setPaper('a4', 'potrait');
        $pdf->save(storage_path('app/public/' . $file_name));
        return [$file_name, $date_formatted, $rrdate];
    }

    public function downloadReport()
    {
        $returned = $this->generatePdf();
        $file_name = $returned[0];
        $date_formatted = $returned[1];
        $rrdate = $returned[2];
        $airline = Airline::find($this->airline);
        return response()->download(storage_path('app/public/' . $file_name));
    }
    public function sendReport()
    {
        $returned = $this->generatePdf();
        $file_name = $returned[0];
        $date_formatted = $returned[1];
        $rrdate = $returned[2];
        $airline = Airline::find($this->airline);
        Mail::to(json_decode($airline->airline_emails))->send(new SendReport($airline->id, storage_path('app/public/' . $file_name), $date_formatted, $rrdate));
    }
}
