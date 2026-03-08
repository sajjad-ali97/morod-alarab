<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    protected $fillable = [
        'site_name',
        'site_logo',
        'about_text',
        'phone',
        'email',
        'whatsapp',
        'address',
        'facebook',
        'instagram',
        'map_iframe',
    ];
}
