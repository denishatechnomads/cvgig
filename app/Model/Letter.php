<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Letter extends Model
{
    use SoftDeletes;
    protected $fillable = ['id','name','description','parent_id'];
    protected $hidden = [
        'deleted_at'
    ];
}
