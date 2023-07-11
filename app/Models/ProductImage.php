<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ProductImage extends Model
{
    use HasFactory;


    protected $fillable = [
        'product_id', 'image'
    ];

    protected $appends = [
        'url',
    ];

    protected $hidden = [
        'image', 'updated_at', 'created_at',
    ];

    public function getUrlAttribute()
    {
        return Storage::disk('public')->url($this->image);
    }
}
