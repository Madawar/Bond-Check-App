<?php

namespace App\Http\Livewire;

use App\Models\Airline;
use Livewire\Component;

class AirlineCreator extends Component
{
    public $airlines;
    public $airline;

    protected $rules = [
        'airline.airline_name' => 'required',
        'airline.send_by' => 'required',
        'airline.remind_by' => '',
        'airline.remind' => '',
        'airline.airline_emails' => 'required',
    ];

    public function mount($slug = null)
    {
        $this->airline = new Airline();
        $this->airlines = Airline::all();
    }
    public function render()
    {
        return view('livewire.airline-creator')->extends('layouts.master_layout');;
    }

    public function edit($id)
    {
        $this->airline =  Airline::find($id);
    }
    public function submit()
    {
        $this->validate();
        // Execution doesn't reach here if validation fails.
        $this->airline->airline_emails =  explode(',', $this->airline->airline_emails);
        $this->airline->save();
        $this->airline = new Airline();
    }
}
