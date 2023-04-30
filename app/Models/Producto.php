<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $table = "prods";
    protected $primaryKey = "ARTICULO";
    public $timestamps = false; 
    protected $hidden = ['SSMA_TimeStamp'];
}
