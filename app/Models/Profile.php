<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    protected $fillable = [

        'first_name', 'last_name', 'street' ,'birthday', 'gender','address', 'city',
         'postal_code', 'province', 'country_code',
    ];

}
