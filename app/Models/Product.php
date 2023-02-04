<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';

    // protected $fillable = [
    //     'cate_id',
    //     'name',
    //     'small_description',
    //     'description',
    //     'original_price',
    //     'selling_price',
    //     'image',
    //     'quantity',
    //     'status',
    // ];

    // public function category()
    // {
    //     return $this->hasMany('App\Models\Category','cate_id','id');
    // }
    // public function getAllProduct()
    // {
    //     $products= DB::table('products')->select('products.*','categories.cate_name')
    //     ->leftjoin('categories','products.cate_id', '=', 'categories.id')->latest()->paginate(5);
    //     return $products;
    // }

     public function getAllProduct()
    {
        $products= DB::table('products')->select('products.*','categories.cate_name')
        ->leftjoin('categories','products.cate_id', '=', 'categories.id')->get();
        return $products;
    }
}
