<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "product";
    protected $primaryKey = 'id';
    public $timestamps = false;


    protected $fillable = ['name', 'detail', 'content', 'image', 'price ', 'choose_id', 'collection_id', 'district_id', 'users_id', 'address', 'configuration', 'active'];


    public function collection (){
        return $this->belongsTo('App\Models\Collection','collection_id','id');
    }


    public function choose (){
        return $this->belongsTo('App\Models\Choose','choose_id','id');
        
    }


    public function add_Items($request){
        $data = $request->all();
        $value= $data['configuration'];
        $configuration = json_encode($value);
        $data['configuration'] = $configuration;


        $this->name                 = $data['name'];
        $this->detail               = $data['detail'];
        $this->content              = $data['description'];
        $this->price                = $data['price'];
        $this->choose_id            = $data['choose_id'];
        $this->collection_id        = $data['collection_id'];
        $this->district_id          = $data['district_id'];
        // $this->users_id             = Auth::user()->id;
        $this->users_id             = 1;
        $this->address              = $data['address'];
        $this->configuration        = $configuration;
        $this->bedrooms             = $data['bedrooms'];
        $this->bathrooms            = $data['bathrooms'];
        $this->sqrt                 = $data['sqrt'];
        $this->active_id            = $data['active'];
        $this->image                = $request->fileName;

        return $this->save();
    }
}

