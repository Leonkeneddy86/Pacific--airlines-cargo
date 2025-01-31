<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    protected $filable = [
        
            "date",
            "departure",
            "arrival",
            "image",
            "airplane_id",
            "status"
    ];
}
