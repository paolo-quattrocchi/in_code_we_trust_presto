<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEcommercePost;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }




    public function index()
    {
        //vogliamo mostrare tutti i post
        $posts = Post::orderBy('id', 'desc')->limit(5)->get();
        return view('posts.index', compact('posts'));
        

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //vogliamo fare un form per creare un nuovo post
        $categories = Category::all();
        return view('posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEcommercePost $request)
    {
        
        //Post::create($request->validated());
        
        Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'image' => $request->file('image')->store('public/media'),
        ]);


        /* $post = new Post();
        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->price = $request->input('price');
        $post->category_id = $request->input('category_id');
       // $post->image = $request->input('image');
        $post->save(); */
        return redirect()->back()->with('message', 'L\'annuncio è stato pubblicato correttamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
       $post->update($request->all());
     
       return redirect()->back()->with('message', 'Complimenti hai modificato il post!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->back()->with('message','Hai cancellato il messaggio!');
    }
}
