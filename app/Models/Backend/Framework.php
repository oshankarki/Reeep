<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Framework extends Model
{
    use HasFactory;
    protected $table='frameworks';
    protected $fillable = ['image','description','title'];
}
