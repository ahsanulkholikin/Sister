<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Identity extends Model
{
    use HasFactory;
    protected $primaryKey = 'idNumber';

    protected $fillable = [
        'idNumber',
        'fullname',
        'gender',
        'IDType',
        'address',
        'religion',
        'maritalStatus',
        'pob',
        'dob'
    ];
}
