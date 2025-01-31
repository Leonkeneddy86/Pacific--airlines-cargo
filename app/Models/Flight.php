<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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

    public function Planes(): BelongsTo
    {
        return $this->belongsTo(Planes::class);
    }
}
