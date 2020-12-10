<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use Searchable;

    use HasFactory;
    protected $fillable = ['title', 'description', 'price', 'image', 'category_id', 'user_id'];

    public function toSearchableArray()
    {
        //$post = $this->posts->pluck('title')->join(', ');
        $array = [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'altro' => 'posts',
            //'post' => $post,
            
        ];
        
        

        return $array;
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    static public function ToBeRevisionedCount(){
        return Post::where('is_accepted' , null)->count();
    }
}
