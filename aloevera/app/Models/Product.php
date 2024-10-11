<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categories;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'cate_id','name_product','name_product2','volume','code', 'images', 'price','description_most','discount','description','active'
    ];
    public function category()
    {
        return $this->belongsTo(Categories::class,'cate_id','id');
    }
}
