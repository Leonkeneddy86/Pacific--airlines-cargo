<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Flight extends Model
{
    protected $filable = [
        
            "date",
            "departure",
            "arrival",
            "image",
            "airplane_id",
            "available"
    ];
}
