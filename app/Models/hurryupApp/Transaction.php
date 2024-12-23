<?php

namespace App\Models\hurryupApp;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    /** @use HasFactory<\Database\Factories\HurryupApp\TransactionFactory> */
    use HasFactory;

    protected $connection = 'mysql';
    protected $table = 'transaction';
    protected $fillable = [
        'active_food_id',
        'phone_number',
        'status', 
    ];
    protected $primaryKey = 'id';
    public $timestamps = true;
}
