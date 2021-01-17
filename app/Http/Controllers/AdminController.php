<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use App\Models\Products;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addpost()
    {

    	return view('addpost');
    }

    public function storePost(Request $request)
    {
    	$isadmin = User::where('id', Auth::user()->id)->pluck("isAdmin");
    	if($isadmin[0] == 1){
	    	Products::create([
	    		"name"=>$request->input('name'),
	    		"description"=>$request->input('description'),
	    		"price"=>$request->input('price')
	    	]);
    	}
    	return redirect()->back();
    }
}
