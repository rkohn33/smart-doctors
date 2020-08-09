<?php

namespace App\SmartDoctor\Doctor;

use Illuminate\Database\Eloquent\Model;

class PaymentPayout extends Model
{
    protected $table = 'payments_payout';
    protected $guarded = ['id'];
    public    $timestamps = false;
}
