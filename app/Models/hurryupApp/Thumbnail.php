<?php

namespace App\Models\hurryupApp;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thumbnail extends Model
{
    /** @use HasFactory<\Database\Factories\HurryupApp\ThumbnailFactory> */
    use HasFactory;

    protected $connection = 'mysql';
    protected $table = 'thumbnail';
    protected $fillable = [
        'id',
        'imgUrl'
    ];
    protected $primaryKey = 'id';
    public $timestamps = false;
}
