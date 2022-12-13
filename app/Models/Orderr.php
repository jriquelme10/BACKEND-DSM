<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orderr extends Model
{
    use HasFactory;

    protected $fillable = [
        'totalAmount',
        'number_table',
        'status',
    ];

    public function mesaId()
    {
        return $this->belongsTo(Table::class, 'number_table');
    }

    public function detallesOrden()
    {
        return $this->hasMany(OrderProduct::class, 'order_id');
    }
}
