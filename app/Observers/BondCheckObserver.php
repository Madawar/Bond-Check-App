<?php

namespace App\Observers;

use App\Models\Awb;
use App\Models\BondCheck;
use Carbon\Carbon;

class BondCheckObserver
{

    public function creating(BondCheck $bondCheck)
    {
        $awb =  Awb::firstOrCreate(['awb_no' => $bondCheck->awb_no], ['awb_no' => $bondCheck->awb_no, 'first_seen' => $bondCheck->date_captured ?? Carbon::today()->format('Y-m-d')]);
        $bondCheck->awb_id = $awb->id;
    }
    /**
     * Handle the BondCheck "created" event.
     *
     * @param  \App\Models\BondCheck  $bondCheck
     * @return void
     */
    public function created(BondCheck $bondCheck)
    {
        //
    }

    /**
     * Handle the BondCheck "updated" event.
     *
     * @param  \App\Models\BondCheck  $bondCheck
     * @return void
     */
    public function updated(BondCheck $bondCheck)
    {
        //
    }

    /**
     * Handle the BondCheck "deleted" event.
     *
     * @param  \App\Models\BondCheck  $bondCheck
     * @return void
     */
    public function deleted(BondCheck $bondCheck)
    {
        //
    }

    /**
     * Handle the BondCheck "restored" event.
     *
     * @param  \App\Models\BondCheck  $bondCheck
     * @return void
     */
    public function restored(BondCheck $bondCheck)
    {
        //
    }

    /**
     * Handle the BondCheck "force deleted" event.
     *
     * @param  \App\Models\BondCheck  $bondCheck
     * @return void
     */
    public function forceDeleted(BondCheck $bondCheck)
    {
        //
    }
}
