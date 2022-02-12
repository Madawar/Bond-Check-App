<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BondCheck extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function airline()
    {
        return $this->hasOne(Airline::class, 'id', 'airline_id');
    }

    public function awb()
    {
        return $this->hasOne(Awb::class, 'id', 'awb_id');
    }
}
