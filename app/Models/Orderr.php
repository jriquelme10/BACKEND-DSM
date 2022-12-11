<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orderr extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [

        'mesa_id',
        'montoTotal',

    ];

    public function mesaId()
    {

        return $this->belongsTo(Table::class, 'number_table');;
    }

    public function detallesOrden()
    {
        return $this->hasMany(OrderProduct::class, 'order_id');
    }
}
