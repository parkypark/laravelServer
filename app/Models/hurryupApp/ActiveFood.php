<?php

namespace App\Models\hurryupApp;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActiveFood extends Model
{
    /** @use HasFactory<\Database\Factories\HurryupApp\ActiveFoodFactory> */
    use HasFactory;

    protected $connection = 'mysql';
    protected $table = 'active_food';
    protected $fillable = [
        'food_ID',
        'curMember',
        'maxMember',
        'discount',
        'status',
    ];
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected function casts(): array
    {
        return [
            'createddatetime'=> 'date:m/d/Y',
            'expireddatetime'=> 'date:m/d/Y',
        ];
    }
}
