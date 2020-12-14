<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEcommercePost;
use App\Models\Category;
use App\Models\Post;
use App\Models\PostImage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

use function GuzzleHttp\Promise\all;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index','search');
    }


   


    public function index()
    {
        //vogliamo mostrare tutti i post
        $posts = Post::orderBy('id', 'desc')->where('is_accepted', true)->get();
        
        return view('posts.index', compact('posts'));
        

    }
    public function search(Request $request)
    {
        //dd($request);
        $q = $request->input('q');
       
        //$posts = Post::search($q)->get();
        $posts = Post::search($q)->get();
        
        
        //$posts = Post::all();
        return view('search_results', compact('q', 'posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //vogliamo fare un form per creare un nuovo post
        $categories = Category::all();
        $uniqueSecret = $request->old('uniqueSecret', base_convert(sha1(uniqid(mt_rand())), 16, 36));
        return view('posts.create', compact('categories', 'uniqueSecret'));
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
        $user = Auth::user();
        $post = new Post();
        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->price = $request->input('price');
        $post->category_id = $request->input('category_id');
        $post->image = $request->file('image')->store('public/media');
        $post->user_id = $user->id;
        $post->save();
        $uniqueSecret = $request->input('uniqueSecret');
        
        $images = session()->get("images.{$uniqueSecret}", []);
        $removedImages = session()->get("removedimages.{$uniqueSecret}", []);
        $images = array_diff($images, $removedImages);
        //dd($image);
        foreach ($images as $image){
            //dd($image);
            $i = new PostImage();
            $fileName = basename($image);
            $newFileName = "public/posts/{$user->posts->last()->id}/{$fileName}";
            Storage::move($image, $newFileName);
            $i->file = $newFileName;
            $i->post_id = $user->posts->last()->id;
            $i->save();
        }
        
          
                  
 
        
        File::deleteDirectory(storage_path("/app/public/temp/{$uniqueSecret}"));
        
        /* $user = Auth::user();
        Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'image' => $request->file('image')->store('public/media'),
            'user_id' => $user->id
        ]); */


        /* $post = new Post();
        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->price = $request->input('price');
        $post->category_id = $request->input('category_id');
       // $post->image = $request->input('image');
        $post->save(); */
        return redirect()->back()->with('message', 'L\'annuncio è stato pubblicato correttamente');
    }

    public function uploadImage(Request $request){
        $uniqueSecret = $request->input('uniqueSecret');
        $fileName = $request->file('file')->store("public/temp/{$uniqueSecret}");
        session()->push("images.{$uniqueSecret}", $fileName);
        return response()->json(
            [
                'id' =>$fileName
            ]
        );
    }

    public function removeImage(Request $request){
        $uniqueSecret = $request->input('uniqueSecret');
        $fileName = $request->input('id');
        session()->push("removedimages.{$uniqueSecret}", $fileName);
        Storage::delete($fileName);
        return response()->json('ok');
    }

    public function getImages(Request $request)
    {
        $uniqueSecret = $request->input('uniqueSecret');
        $images = session()->get("images.{$uniqueSecret}", []);
        $removedImages = session()->get("removedimages.{$uniqueSecret}", []);
        $images = array_diff($images, $removedImages);
        $data = [];
        foreach ($images as $image){
            $data[] = [
                'id' => $image,
                'src' => Storage::url($image)
            ];
        }
        return response()->json($data);
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
