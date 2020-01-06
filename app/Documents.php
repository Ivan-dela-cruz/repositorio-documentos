<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Documents extends Model
{
    protected $fillable=[

        'id_category','name','slug','body','status','file','description','id_user',

    ];

    public function  category(){
        return $this->belongsTo(Category::class,'id_category');
    }
    public function  user(){
        return $this->belongsTo(User::class,'id_user');
    }
    public function scopeName($query,$name){
        if(trim($name) !=""){
            $query->where('name',"LIKE","%$name%");
        }

    }
}
