<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;
    protected $table='albums';
    protected $fillable = ['title'];

    public function gallery()
    {
        return $this->hasMany(Gallery::class,'album_id','id');
    }
}
