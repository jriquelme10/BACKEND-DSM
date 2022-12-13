<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = [
        'quantity',
        'product_id',
        'order_id',
    ];

    public function productoId()
    {
        return $this->belongsTo(Producto::class, 'product_id');
    }

    public function resumen_orden_id()
    {
        return $this->belongsTo(Resumen_orden::class, 'order_id');
    }
}
