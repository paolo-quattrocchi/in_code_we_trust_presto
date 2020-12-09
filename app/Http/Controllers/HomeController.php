<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEcommercePost;
use App\Models\Post;
use Illuminate\Http\Request;

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
        $posts = Post::all();
        return view('home',compact('posts'));
    }

   /*  public function store(StoreEcommercePost $request){
        StoreEcommercePost::create([
            'title'=>$request->input(('title')),
            'description'=>$request->input(('description')),
            'price'=>$request->input(('price')),
            'image'=>$request->input(('image')),
            'category_id'=>$request->input(('category_id')),
        ]);
    } */
}
