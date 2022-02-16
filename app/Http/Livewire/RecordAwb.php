<?php

namespace App\Http\Livewire;

use App\Models\Airline;
use App\Models\BondCheck;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class RecordAwb extends Component
{

    public $bondcheck;
    public $airlines;
    public $suggestions = [];
    protected $rules = [
        'bondcheck.awb_no' => 'required|size:11',
        'bondcheck.airline_id' => 'required',
        'bondcheck.location' => 'required',
        'bondcheck.aod' => 'required|size:3',
        'bondcheck.nop' => 'required|numeric',
        'bondcheck.date_captured' => 'required|date',
        'bondcheck.dimensions' => '',
        'bondcheck.weight' => 'nullable|numeric',
        'bondcheck.shc' => 'nullable|size:3',
        'bondcheck.remarks' => ''
    ];

    public function mount($slug = null)
    {
        $this->bondcheck = new BondCheck();
        $this->bondcheck->date_captured = Carbon::today()->format('Y-m-d');
        $this->airlines = Airline::all()->pluck('airline_name', 'id');
    }

    public function render()
    {
        $awbs = BondCheck::where('date_captured', Carbon::today()->format('Y-m-d'))->get();
        return view('livewire.record-awb')->with(compact('awbs'))->extends('layouts.master_layout');
    }

    public function edit($id)
    {
        $this->bondcheck = BondCheck::find($id);
    }

    public function updatedBondcheckawbno()
    {

        $this->suggestions = BondCheck::select('awb_no')->distinct()->where('awb_no', 'like', '%' . $this->bondcheck->awb_no . '%')->limit(5)->get();
    }

    public function chooseSuggestion($awb)
    {
        $sg = BondCheck::where('awb_no', $awb)->latest()->first();
        $this->bondcheck->airline_id  = $sg->airline_id;
        $this->bondcheck->awb_no  = $sg->awb_no;
        $this->bondcheck->location = $sg->location;
        $this->bondcheck->aod = $sg->aod;
        $this->bondcheck->nop = $sg->nop;
    }


    public function submit()
    {

        $this->validate();
        // Execution doesn't reach here if validation fails.
        $this->bondcheck->date_captured = $this->bondcheck->date_captured  ?? Carbon::today()->format('Y-m-d');
        $this->bondcheck->captured_by = Auth::user()->displayname[0];
        $this->bondcheck->save();
        $this->bondcheck = new BondCheck();
        $this->bondcheck->date_captured = Carbon::today()->format('Y-m-d');
    }
}
