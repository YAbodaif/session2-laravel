<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Seller;

class Product extends Model
{
    use HasFactory;
    protected $fillable=[
        'title','description','price','category','img','seller_id'
    ];
    public function categories(){
        return $this->belongsToMany('App\Models\Category');
    }
    public function seller(){
        return $this->belongsTo('App\Models\Seller');
    }
}
