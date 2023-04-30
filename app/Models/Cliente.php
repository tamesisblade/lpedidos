<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $table = "clients";
    protected $primaryKey = "CLIENTE";
    public $timestamps = false; 
    protected $hidden = ['SSMA_TimeStamp'];
}
