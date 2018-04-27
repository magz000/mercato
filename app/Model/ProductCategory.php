<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{

    protected $table = 'product_categories';

    public static function get_main() {
        return ProductCategory::where('parent', '=', null)->get();
    }

    public static function get_sub($parent) {
        return ProductCategory::where('parent', '=', $parent)->get();
    }

    public function products(){
        return $this->hasMany('App\Model\Product', 'category_id');
    }

}
