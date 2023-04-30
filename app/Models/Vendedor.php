<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendedor extends Model
{
    use HasFactory;
    protected $table = "vends";
    protected $primaryKey = "Vend";
    public $timestamps = false; 
    protected $hidden = ['SSMA_TimeStamp'];
}
