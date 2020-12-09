<x-layout>
    <div class="container">
        <div class="row">
            @foreach ($category->posts()->get() as $post)
            <div class="col-12 text-center mb-5 text-uppercase">
                
                <h1>{{$post->category->name}}</h1>
            </div>
                <div class="col-12 col-md-4">
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
            </div>
                @endforeach
        </div> 
        <div class="row">
            <div class="col-12 mt-5 mb-3">
                
                <h2>Ecco i post delle altre categorie</h2>
            </div>
            @foreach ($posts as $post)
                    <div class="col-12 col-md-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">{{$post->title}}</h5>
                        <p class="card-text">{{$post->price}} €</p>
                        <img src="{{Storage::url($post->image)}}" class="card-img-top img-fluid img-responsive" alt="{{$post->title}}">
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
            </div>
                @endforeach
        </div> 
    </div>
</div>
</x-layout>

<style>
    .img-responsive {
    width: auto;
    height: 300px;
}
</style>