<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = "news";
    protected $primaryKey = 'id';
    public $timestamps = false;


    protected $fillable = ['name', 'detail', 'content', 'image', 'active_id ', 'user_id'];


    public function user (){
        return $this->belongsTo('App\User','user_id','id');
    }


    public function active (){
        return $this->belongsTo('App\Models\Active','active_id','id');
        
    }



}

