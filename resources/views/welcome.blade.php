<x-layout>
  <div class="container">
    <div class="row">
      <div class="col-12">
        @if (session('access.denied.revisor.only'))
        <div class="alert alert-danger">
          <ul>
            <li>{{session('access.denied.revisor.only')}}</li>
          </ul>   
        </div>
        @endif
      </div>
    </div> 
    
  </div>
    <!-- Full Page Image Header with Vertically Centered Content -->
<header class="masthead">
  <div class="overlay"></div>
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-12 text-center">
          <h1 class="font-weight-light">Vertically Centered Masthead Content</h1>
          <p class="lead">A great starter layout for a landing page</p>
        </div>
      </div>
    </div>
  </header>
  <div class="container">
    <div class="row">
        @foreach ($posts as $post)
        <div class="col-12 col-md-4">
            <div class="card my-5">
                <div class="card-body">
                    <h5 class="card-title">{{$post->title}}</h5>
                    <p class="card-text">{{$post->price}} €</p>
                    <img src="{{Storage::url($post->image)}}" class="card-img-top img-fluid img-responsive" alt="{{$post->title}}">
                    <p class="card-text">{{$post->description}}</p>
                    <p class="card-text">{{$post->created_at}}</p>                        
                    <p class="card-text">{{$post->category->name}}</p> 
                    <p>Autore: {{$post->user->name}}</p>                       
                    <a href="{{route('posts.edit', compact('post'))}}" class="btn btn-primary">Modifica</a>
                    <a href="{{route('posts.show', compact('post'))}}" class="btn btn-primary">Visualizza</a>
                    <form action="{{route('posts.destroy', compact('post'))}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Cancella</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div> 
</div>
</div>
  
</x-layout>