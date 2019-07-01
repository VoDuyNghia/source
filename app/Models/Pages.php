<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
    protected $table = "pages";
    protected $primaryKey = 'id';
    public $timestamps = false;


    public function add_Items($request){
        $data = $request->all();
        $this->name                 = $data['name'];
        $this->name_ascii           = str_slug($data['name']);
        $this->content              = $data['description'];
        return $this->save();
    }

     public function edit_Items($request, $id) {
        $data                          = $request->all();
        $objPages                      = $this->findOrfail($id);
        $objPages->name                = $data['name'];
        $objPages->name_ascii          = str_slug($data['name']);
        $objPages->content             = $data['description'];
        return $objPages->save();
    }
}

