<?php

namespace App\Models\hurryupApp;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    /** @use HasFactory<\Database\Factories\HurryupApp\FoodFactory> */
    use HasFactory;

    protected $connection = 'mysql';
    protected $table = 'food';
    protected $fillable = [
        'restaurantID',
        'name',
        'description',
        'ingredients',
        'price',
        'enabled',
    ];
    protected $primaryKey = 'id';
    public $timestamps = false;
}
