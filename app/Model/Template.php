<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Template extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'description', 'image','path','type','required_image','tag','is_active'
    ];

    protected $hidden = [
        'deleted_at'
    ];

}
