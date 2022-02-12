<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Awb extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function bondchecks()
    {
        return $this->hasMany(BondCheck::class);
    }
}
