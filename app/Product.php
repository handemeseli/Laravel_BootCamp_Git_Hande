<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable =[
        'name','photo','price','created_by','updated_by','deleted_bu'
    ];

    public function user(){
        return $this->hasMany('App\User','id','created_by');
    }
}
