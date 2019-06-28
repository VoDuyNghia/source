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
        $this->active_id            = $data['active'];
        $this->image                = $request->fileName;

        return $this->save();
    }


    public function edit_Items($request, $id) {
        $data = $request->all();
        $value                         = $data['configuration'];
        $configuration                 = json_encode($value);
        $data['configuration']         = $configuration;


        $objItem                       = $this->findOrfail($id);
        $objItem->name                 = $data['name'];
        $objItem->detail               = $data['detail'];
        $objItem->content              = $data['description'];
        $objItem->price                = $data['price'];
        $objItem->choose_id            = $data['choose_id'];
        $objItem->collection_id        = $data['collection_id'];
        $objItem->district_id          = $data['district_id'];
        $objItem->users_id             = 1;
        $objItem->address              = $data['address'];
        $objItem->configuration        = $configuration;
        $objItem->active               = $data['active'];
        $objItem->image                = $request->fileName;

        return $objItem->save();
    }
}

