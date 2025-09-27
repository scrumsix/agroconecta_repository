<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * Los atributos que se pueden asignar masivamente.
     */
    protected $fillable = [
        'user_id',
        'total',
        'status',
    ];

    /**
     * Un pedido pertenece a un usuario (User).
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Un pedido tiene muchos ítems (OrderItem).
     */
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}