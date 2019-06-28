<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = "image_detail";
    protected $primaryKey = 'id';
    public $timestamps = false;


    protected $fillable = ['image_detail', 'product_id'];

    
}

