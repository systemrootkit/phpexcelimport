<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exceldata extends Model
{
    use HasFactory;
    protected $table='exceldata';
    protected $fillable = ['date', 'tasks', 'priority', 'status'];
}
