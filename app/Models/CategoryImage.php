<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class CategoryImage extends Model
{
    use HasFactory;


    protected $fillable = [
        'category_id', 'image',
    ];
    
    public function getUrlAttribute()
    {
        return Storage::disk('public')->url($this->image);
    }
}
