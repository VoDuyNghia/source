<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "product";
    protected $primaryKey = 'id';
    public $timestamps = false;


    protected $fillable = ['name', 'detail', 'content', 'image', 'price ', 'choose_id', 'collection_id', 'district_id', 'users_id', 'address', 'configuration', 'active'];


    public function contact() {
        return $this->hasMany('App\Models\Contact');
    }


    public function slider()
    {
        return $this->belongsToMany('App\Models\Slider');
    }


    public function collection (){
        return $this->belongsTo('App\Models\Collection','collection_id','id');
    }


    public function choose (){
        return $this->belongsTo('App\Models\Choose','choose_id','id');
    }

    public function status (){
        return $this->belongsTo('App\Models\Status','status_id','id');
    }

    public function district (){
        return $this->belongsTo('App\Models\District','district_id','id');
    }


    public function add_Items($request){
        $data                      = $request->all();
        $value                     = $data['configuration'];
        $configuration             = json_encode($value);
        $data['configuration']     = $configuration;
        $value_vn                  = $data['configuration_vn'];
        $configuration_vn          = json_encode($value_vn);
        $data['configuration_vn']  = $configuration_vn;


        $this->name                 = $data['name'];
        $this->name_vn              = $data['name_vn'];
        $this->detail               = $data['detail'];
        $this->detail_vn            = $data['detail_vn'];
        $this->content              = $data['description'];
        $this->content_vn           = $data['description_vn'];
        $this->price                = $data['price'];
        $this->choose_id            = $data['choose_id'];
        $this->status_id            = $data['status_id'];
        $this->collection_id        = $data['collection_id'];
        $this->district_id          = $data['district_id'];
        // $this->users_id             = Auth::user()->id;
        $this->users_id             = 1;
        $this->address              = $data['address'];
        $this->configuration        = $configuration;
        $this->configuration_vn     = $configuration_vn;
        $this->bedrooms             = $data['bedrooms'];
        $this->bathrooms            = $data['bathrooms'];
        $this->sqrt                 = $data['sqrt'];
        $this->active_id            = $data['active'];
        $this->image                = $request->fileName;

        return $this->save();
    }
}

