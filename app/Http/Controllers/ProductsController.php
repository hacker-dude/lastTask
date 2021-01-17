<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\comments;

class ProductsController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function seeproduct($id)
    {
    	$product = Products::where('id', $id)->first();
    	$comments = comments::where('product_id', $id)->get();
    	return view('product', ["product"=>$product, "comments"=>$comments]);
    }

    public function seeproductJson($id)
    {
        $product = Products::where('id', $id)->first();
        $comments = comments::where('product_id', $id)->get();
        $result = [
            "product"=>$product,
            "comments"=>$comments;
        ]

        return $result;
    }
}
