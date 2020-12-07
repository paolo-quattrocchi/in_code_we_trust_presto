<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
        //dd($category);
        //vogliamo mostrare tutti post di questa  categoria
        //Ottimo, lo facciamo nella vista tramite la variabile category.

        //Vogliamo poter far vedere all'utente tutti i post tranne quelli della categoria selzionata.
        $posts = Post::where('category_id','!=',$category->id)->get();
        //dd($category);
        return view('categories.show', compact('category','posts'));
        

    }
}
