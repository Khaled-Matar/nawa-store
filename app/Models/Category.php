<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Category extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name', 'image',
    ];
    public function products()
    {
        // return $this->hasMany(Product::class);           // the two are true because it takes the value by default
        return $this->hasMany(Product::class, 'category_id');
    }

    // Attribute Accessors: image_url | $product->image_url
    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return Storage::disk('public')->url($this->image);
        } else {
            return 'https://placehold.co/60x60?text=No+Image';
        }
    }

    public function getNameAttribute($value)
    {
        return ucwords($value);
    }
}
