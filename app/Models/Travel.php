<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Travel extends Model
{
    use HasFactory;

    protected $table = 'travels';

    public function driver(): HasOne
    {
        return $this->hasOne(Driver::class);
    }

    public function vehicles(): HasOne
    {
        return $this->hasOne(Vehicle::class);
    }

}
