<?php

namespace App\Models\hurryupApp;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    /** @use HasFactory<\Database\Factories\HurryupApp\AddressFactory> */
    use HasFactory;
  
    protected $connection = 'mysql';
    protected $table = 'address';
    protected $fillable = [
        'id',
        'address1',
        'address2',
        'city',
        'province',
        'postal',
        'country'
    ];
    protected $primaryKey = 'id';
    public $timestamps = false;
}
