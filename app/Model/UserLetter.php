<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserLetter extends Model
{
    use SoftDeletes;

    protected $fillable = [
        "user_id", "template_id","title","letter_type", "letter_subtype", "contact_info", "recipient_info", "subject",
        "greeting", "opener", "body","call_to_action","closer", "complete_step","style_section","sortable"
    ];

    protected $hidden = [
        'deleted_at'
    ];

    public function template(){
        return $this->belongsTo(Template::class,'template_id','id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function getContactInfoAttribute($value){
        return json_decode($value,true);
    }

    public function getRecipientInfoAttribute($value){
        return json_decode($value,true);
    }

    public function getStyleSectionAttribute($value){
        return json_decode($value,true);
    }

    public function getSortableAttribute($value){
        return explode(",",$value);
    }
}
