<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * Los atributos que se pueden asignar masivamente.
     */
    protected $fillable = [
        'user_id',
        'name',
        'description',
        'price',
        'stock',
    ];

    /**
     * Un producto pertenece a un usuario (campesino).
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}