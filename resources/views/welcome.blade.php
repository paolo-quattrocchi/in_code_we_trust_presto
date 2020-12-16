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
          <h1 class="font-weight-light display-4 text-white">{{ __('ui.Welcome') }}</h1>
          <p class="lead text-white">{{ __('ui.Presto') }}</p>
        </div>
      </div>
    </div>
  </header>
  
  <div class="container">
    <div class="row">
      <h2 class="mt-5">Ultimi annunci</h2>
    </div>
    <div class="row">
      @foreach ($posts as $post)
      <div class="col-12 col-md-4">
        <div class="card my-5 shadow">
          <div class="card-img">
            <img src="{{Storage::url($post->image)}}" class="card-img-top" alt="{{$post->title}}">
          </div>
          <div class="card-body">
            <h4 class="card-title">{{$post->title}}</h4>
            <p class="card-text">{{$post->price}} €</p>
            <p class="card-text trunc">{{$post->description}}</p>
            <p class="card-text">{{ __('ui.Data') }}: {{$post->created_at->format('d-m-Y')}}</p>                        
            <p class="card-text">{{ __('ui.Categoria') }}: {{$post->category->name}}</p> 
            <p>{{ __('ui.Autore') }}: {{$post->user->name}}</p> 
            <a href="{{route('posts.show', compact('post'))}}" class="btn bg-btn rounded-pill text-white">{{ __('ui.Visualizza') }}</a>
            
            
            
            
            
            
          </div>
        </div>
      </div>
      @endforeach
    </div> 
  </div>
</div>

</x-layout>