<?php

namespace App\Http\Livewire;

use App\Models\ReportSendLog;
use Livewire\Component;

class Dashboard extends Component
{
    public $logs;

    public function mount()
    {

        $this->logs = ReportSendLog::all();
    }

    public function render()
    {
        return view('livewire.dashboard')->extends('layouts.master_layout');;
    }
}
