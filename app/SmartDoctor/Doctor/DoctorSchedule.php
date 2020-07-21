<?php

namespace App\SmartDoctor\Doctor;

use Illuminate\Database\Eloquent\Model;

class DoctorSchedule extends Model
{
    protected $table = 'doctor_availablity';
    protected $guarded = ['id'];
    public    $timestamps = false;
}
