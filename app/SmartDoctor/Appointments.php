<?php

namespace App\SmartDoctor;

use Illuminate\Database\Eloquent\Model;

class Appointments extends Model
{
    protected $table = 'appointment';
    protected $guarded = ['id'];
    public    $timestamps = false;
}
