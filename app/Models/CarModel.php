<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class CarModel extends Model
{
    use HasFactory;

    public function brand(): HasOne{
        return $this->hasOne(Brand::class);
    }

    public function vehicle(): HasMany{
        return $this->hasMany(Vehicle::class);
    }
}
