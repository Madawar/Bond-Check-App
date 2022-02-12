<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportSendLog extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function airline()
    {
        return $this->hasOne(Airline::class, 'id', 'airline_id');
    }
}
