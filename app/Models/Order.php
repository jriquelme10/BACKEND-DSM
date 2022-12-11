<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'number_table',
        'product',
        'status',
        'time',
        'date_order',
        'time_order',
        'totalAmount',
    ];
}
