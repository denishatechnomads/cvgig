<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Prewritten_content extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'id','type','title','description'
    ];
    protected $hidden = [
        'deleted_at'
    ];
}
