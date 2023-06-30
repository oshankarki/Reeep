<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;
    protected $table='galleries';
    protected $fillable = ['title','image','album_id'];

    function album()
    {
        return $this->hasOne(Album::class, 'id','album_id');
    }

}
