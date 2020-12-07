<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4">
                @foreach ($category->posts()->get() as $post)
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{$post->title}}</h5>
                        <p class="card-text">{{$post->price}} €</p>
                        <img src="{{Storage::url($post->image)}}" class="card-img-top" alt="{{$post->title}}">
                        <p class="card-text">{{$post->description}}</p>
                        <p class="card-text">{{$post->created_at}}</p>                        
                        <p class="card-text">{{$post->category->name}}</p>                        
                        <a href="{{route('posts.edit', compact('post'))}}" class="btn btn-primary">Modifica</a>
                        <a href="{{route('posts.show', compact('post'))}}" class="btn btn-primary">Visualizza</a>
                        <form action="{{route('posts.destroy', compact('post'))}}" method="POST">
                            @csrf
                            @method('DELETE')
                              <button class="btn btn-danger"> Cancella</button>
                          </form>
                    </div>
                </div>
                @endforeach
            </div>
        </div> 
        <div class="row">
            <div class="col-12 col-md-4">
                <h1>Ecco i post delle altre categorie</h1>
                @foreach ($posts as $post)
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{$post->title}}</h5>
                        <p class="card-text">{{$post->price}} €</p>
                        <img src="{{Storage::url($post->image)}}" class="card-img-top" alt="{{$post->title}}">
                        <p class="card-text">{{$post->description}}</p>
                        <p class="card-text">{{$post->created_at}}</p>                        
                        <p class="card-text">{{$post->category->name}}</p>                        
                        <a href="{{route('posts.edit', compact('post'))}}" class="btn btn-primary">Modifica</a>
                        <a href="{{route('posts.show', compact('post'))}}" class="btn btn-primary">Visualizza</a>
                        <form action="{{route('posts.destroy', compact('post'))}}" method="POST">
                            @csrf
                            @method('DELETE')
                              <button class="btn btn-danger"> Cancella</button>
                          </form>
                    </div>
                </div>
                @endforeach
            </div>
        </div> 
    </div>
</div>
</x-layout>