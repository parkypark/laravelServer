<?php
 
namespace App\Models\hurryupApp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Restaurant extends Model
{
    /** @use HasFactory<\Database\Factories\HurryupApp\RestaurantFactory> */
    use HasFactory;
 
    protected $connection = 'mysql';
    protected $table = 'restaurant';
    protected $fillable = [
        'name',
        'description',
        'address_id',
        'image_id'
    ];

    protected $primaryKey = 'id';
    public $timestamps = true;

    public function address()
    {
        return $this->belongsTo(Address::class, 'address_id');
    }

    public function image()
    {
        return $this->belongsTo(Image::class, 'image_id');
    }
}
