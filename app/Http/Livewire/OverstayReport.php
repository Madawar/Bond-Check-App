<?php

namespace App\Http\Livewire;

use App\Models\Airline;
use App\Models\Awb;
use App\Models\BondCheck;
use Livewire\Component;
use Illuminate\Database\Eloquent\Builder;
use Carbon\Carbon;

class OverstayReport extends Component
{
    public $airline;
    public $airlines;
    public $awbs = [];
    public function mount($slug = null)
    {

        $this->airlines = Airline::all()->pluck('airline_name', 'id');
    }
    public function render()
    {
        return view('livewire.overstay-report')->extends('layouts.master_layout');
    }
    public function updatedAirline()
    {
        $this->report();
    }
    public function report()
    {
        $query = Awb::query();
        $query->with(['bondchecks' => function ($query) {
            $query->orderBy('date_captured');
        }]);
        $query->when($this->airline, function ($q, $filter) {
            return $q->whereHas('bondchecks', function (Builder $query) {
                $query->where('airline_id', $this->airline);
            });
        });
        $query->where('flown', 0);
        // $query->orderby('airline_id', 'desc')->orderBy('date_captured', 'desc')->orderby('location', 'desc')->orderBy('awb_no', 'desc');
        $this->awbs = $query->get();
    }
}
