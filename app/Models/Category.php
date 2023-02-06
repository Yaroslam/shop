<?php

namespace App\Models;

use App\Traits\Models\HasSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    use HasSlug;

    protected $fillable = [
        'slug', 'title'
    ];


    protected static function boot(){
        parent::boot();
    }

    public function products(){
        return $this->belongsToMany(Products::class);
    }
}