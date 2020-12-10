<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class RevisorController extends Controller
{
    public function __construct() {
        $this->middleware('auth.revisor');
    }
    public function index()
    {
        //dd('Solo per revisori del piffero');
        $post = Post::where('is_accepted', null)->orderBy('created_at', 'desc')->first();
        return view('revisors.index', compact('post'));
    }

    private function setAccepted($post_id, $value){
        $post = Post::find($post_id);
        $post->is_accepted = $value;
        $post->save();
        return redirect(route('revisors.index'));

    }

    public function accept($post_id){
        return $this->setAccepted($post_id, true);
    }

    public function reject($post_id){
        return $this->setAccepted($post_id, false);
    }
}
