<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    protected $table = "collection";
    protected $primaryKey = 'id';
    public $timestamps = false;



    public function add_Collection($request) {
		$this->name 			= $request->name_category;
    	$this->name_ascii 		= str_slug($request->name_category);
    	$this->position 		= $request->position;

    	return $this->save();
    }
    


}

