<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $table='menus';
    protected $fillable = ['title','slug','status','order','parent_id','type'];
    public function children()
    {
        return $this->hasMany(Menu::class, 'parent_id');
    }
    public function parent()
    {
        return $this->hasOne(Menu::class, 'id','parent_id');
    }

}
