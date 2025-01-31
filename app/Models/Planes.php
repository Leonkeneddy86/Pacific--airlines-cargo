<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Planes extends Model
{
    protected $fillable = [

        'name',
        'places'
    ];
}
