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
        $this->middleware('auth')->except('welcome');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){

        return view('home');
    }

    public function welcome()
    {
        /* $posts = Post::all();
        return view('home',compact('posts')); */
        $posts = Post::orderBy('id', 'desc')->where('is_accepted', true)->limit(5)->get();
        
        return view('welcome', compact('posts'));
    }

    public function locale($locale){
        session()->put('locale' , $locale);
        return redirect()->back();
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
