<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'id','user_id','payment_id','amount','discount','total_amount','payment_status','payment_type','reference_id','resume_type','action'
    ];
    protected $hidden = [
        'deleted_at'
    ];
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
