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
        // other fillable fields go here
    ];

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
