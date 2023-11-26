<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{

    use HasFactory, SoftDeletes;

    protected $guarded=[];

    /**
     * Define a relação entre a marca e seus modelos de carro.
     */
    public function model(): HasMany{
        return $this->hasMany(CarModel::class);
    }
}
