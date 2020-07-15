<?php

namespace App\SmartDoctor;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Users extends Model
{
    protected $table = 'users';
    protected $guarded = ['id'];
    public    $timestamps = false;
}
