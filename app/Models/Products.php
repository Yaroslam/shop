<?php

namespace App\Models;

use App\Traits\Models\HasSlug;
use Database\Factories\ProductsFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    use HasSlug;

    protected $fillable = [
        'price', 'title', 'slug', 'brand_id', 'thumbnail',
    ];


    protected static function boot(){
        parent::boot();
    }

    public function brand(){
        return $this->belongsTo(Brand::class);
    }

    public function category(){
        return $this->belongsToMany(Category::class);
    }


}
