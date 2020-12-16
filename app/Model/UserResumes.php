<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserResumes extends Model
{
    use SoftDeletes;

    protected $fillable = [
        "user_id", "template_id","title", "contact_info", "experience_info", "education", "skills", "summary",
        "extra_section", "complete_step","style_section","upload_file","sortable"
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

    public function getExperienceInfoAttribute($value){
        return json_decode($value,true);
    }

    public function getEducationAttribute($value){
        return json_decode($value,true);
    }

    public function getExtraSectionAttribute($value){
        return json_decode($value,true);
    }

    public function getStyleSectionAttribute($value){
        return json_decode($value,true);
    }

    public function getSortableAttribute($value){
        return explode(",",$value);
    }

}
