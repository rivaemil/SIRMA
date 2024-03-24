<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class proveedore extends Model
{
    protected $table = 'proveedores';
    protected $primaryKey = 'id_proveedores';
    use HasFactory;
}
