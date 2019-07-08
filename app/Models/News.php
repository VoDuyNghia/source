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


    public function add_Items($request){
        $data = $request->all();
        if(!isset($data['address'])) {
            $data['address'] = null;
        }
        $this->name                 = $data['name'];
        $this->name_vn              = $data['name_vn'];
        $this->detail               = $data['detail'];
        $this->detail_vn            = $data['detail_vn'];
        $this->content              = $data['description'];
        $this->content_vn           = $data['description_vn'];
        $this->address              = $data['address'];
        // $this->users_id             = Auth::user()->id;
        $this->user_id              = 1;
        $this->active_id            = $data['active'];
        $this->image                = $request->fileName;

        return $this->save();
    }
}

