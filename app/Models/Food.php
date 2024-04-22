<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ingredient;

class Food extends Model
{
    use HasFactory;

    protected $table = 'food';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'price_cost',
    ];

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class, 'food_has_ingredient');
    }
}
