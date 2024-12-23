<?php

namespace App\Models\hurryupApp;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhoneList extends Model
{
    /** @use HasFactory<\Database\Factories\HurryupApp\PhoneListFactory> */
    use HasFactory;

    protected $connection = 'mysql';
    protected $table = 'phone_list';
    protected $fillable = [
        'group_id',
        'phone_number',
        'status',
        'encrypted_password', 
    ];
    protected $primaryKey = ['group_id','phone_number'];
    public $timestamps = false;
    public $incrementing = false;
}

