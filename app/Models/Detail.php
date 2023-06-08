<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;
    protected $table ='details';
    protected $fillable = [
        'first_name',
        'last_name',
        'father_name',
        'mobile_number',
        'address',
    ];
}
