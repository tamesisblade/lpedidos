<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
    protected $table = "pedidos";
    protected $primaryKey = "pedido";
    public $timestamps = false; 
    protected $hidden = ['SSMA_TimeStamp'];
}
