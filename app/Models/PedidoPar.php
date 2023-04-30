<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedidoPar extends Model
{
    use HasFactory;
    protected $table = "pedpar";
    protected $primaryKey = "ID_SALIDA";
    public $timestamps = false; 
    protected $hidden = ['SSMA_TimeStamp'];
}
