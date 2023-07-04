<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderLine extends Model
{
    use HasFactory;

    protected $table = 'order_lines';
    
    protected $fillable =[
        'order_id',
        'product_id',
        'product_name',
        'customer_email',
        'price',
        'quantity',
        ];

        public function order()
        {
            return $this->belongsTo(Product::class)->withDefault([
                'name' => $this->product_name,
                'price' => $this->price,
            ]);
        }
}
