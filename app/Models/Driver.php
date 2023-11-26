<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Driver extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded=[];

    /**
     * Define a relação entre o motorista e suas viagens associadas.
     */
    public function travel(): HasMany
    {
        return $this->hasMany(Travel::class);
    }

    /**
     * Define a relação entre o motorista e os veículos associados através das viagens.
     */
    public function vehicle(): BelongsToMany
    {
        return $this->belongsToMany(Vehicle::class,'travels','driver_id','vehicle_id');
    }

    /**
     * Define a relação entre o motorista e o utilizador associado.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
