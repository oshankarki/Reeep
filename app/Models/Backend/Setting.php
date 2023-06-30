<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $table='settings';
    protected $fillable = ['office_location','office_email','office_phone','facebook_link','instagram_link','linkedin_link','youtube_link'];
}
