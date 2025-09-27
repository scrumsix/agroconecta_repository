<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    /**
     * Los atributos que se pueden asignar masivamente.
     */
    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'price',
    ];

    /**
     * Un ítem de pedido pertenece a un pedido (Order).
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * Un ítem de pedido corresponde a un producto (Product).
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}