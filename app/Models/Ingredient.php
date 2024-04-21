<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Food;

class Ingredient extends Model
{
    use HasFactory;

    protected $table = 'ingredient';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'price_cost',
    ];

    public function foods()
    {
        return $this->belongsToMany(Food::class, 'food_has_ingredient');
    }
}
