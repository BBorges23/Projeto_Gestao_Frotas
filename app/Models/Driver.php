<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Driver extends Model
{
    use HasFactory;

    public function travel(): HasMany
    {
        return $this->hasMany(Travel::class);
    }

    public function vehicle(): BelongsToMany
    {
        return $this->belongsToMany(Vehicle::class,'travels','driver_id','vehicle_id');
    }

}
