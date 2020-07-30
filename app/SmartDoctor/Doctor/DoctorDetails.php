<?php

namespace App\SmartDoctor\Doctor;

use Illuminate\Database\Eloquent\Model;

class DoctorDetails extends Model
{
    protected $table = 'doctor_details';
    protected $guarded = ['id'];
    public    $timestamps = true;
}
