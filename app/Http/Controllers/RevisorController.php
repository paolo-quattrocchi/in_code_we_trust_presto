<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Mail\RequestRevisor;
use App\Models\User;
use Illuminate\Http\Request;
use function GuzzleHttp\Promise\all;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class RevisorController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('auth.revisor')->except('request', 'sendRequest');
    }
    public function index()
    {
        //dd('Solo per revisori del piffero');
        $post = Post::where('is_accepted', null)->orderBy('created_at', 'desc')->first();
        $user = Auth::user();
        //$posts_all = Post::where("user_id", "=", $user->id)->where('is_accepted', true)->get();
        //$posts_all = Post::orderBy('id', 'desc')->where('is_accepted', true)->get();
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

    public function request()
    {
        return view('revisors.request_revisor');
    }

    public function sendRequest(Request $request){
        
        /* $contact = $request->input('name');
        $contact = $request->input('message');
        $contact = $request->input('email');
        dd($contact); */

        Mail::to($request->user())->send(new RequestRevisor($request));
        return redirect(route('home'));
    }
}
