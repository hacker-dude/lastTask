<?php

namespace App\Http\Controllers;
use App\Services\CommentServices;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\comments;
use Auth;
use App\Models\reply;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Products::get();
        return view('home', ["products"=>$products]);
        // return $products;
    }

    public function indexjson()
    {
        $products = Products::get();
        $result = ["products"=>$products];

        return $result;

    }

    public function addcomment(Request $request)
    {
        comments::create([
            "product_id"=>$request->input('post_id'),
            "user_id"=>Auth::user()->id,
            "comment"=>$request->input('comment')
        ]);
        return redirect()->back();
    }

    public function addreply(Request $request)
    {
        reply::create([
            "user_id"=>Auth::user()->id,
            "comment_id"=>$request->input('comment_id'),
            "reply"=>$request->input('reply')
        ]);

        return redirect()->back();
    }
}
