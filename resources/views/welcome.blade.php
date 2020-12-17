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
      <div class="col-md-6 col-lg-4">
        <div class="card my-5 shadow">
          <div class="card-img">
            <div class="card-price">{{$post->price}} €</div>
            <img src="{{Storage::url($post->image)}}" class="card-img-top" alt="{{$post->title}}">
          </div>
          <div class="card-body">
            <small> {{$post->category->name}}</small> 
            <h3 class="card-title">{{$post->title}}</h3>          
            <p class="card-desc">{{substr($post->description, 0, 100)}} ...</p>
            
            <a href="{{route('posts.show', compact('post'))}}" class="btn bg-btn rounded-pill text-white w-75 d-block mx-auto">{{ __('ui.Visualizza') }}</a>
            
          </div>
          <div class="card-footer bg-white">
            <div class="row no-gutters">
              <div class="col-6 text-center"> <p><i class="far fa-clock"></i> {{$post->created_at->format('d M Y')}}</p> </div>
              <div class="col-6 text-center"><p><i class="far fa-user"></i> {{$post->user->name}}</p> </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div> 
  </div>

  <div class="container">
    <div class="row be-revisor m-2">
      <div class="col-md-6 order-2 order-md-1"><img src="/images/revisor.svg" class="img-fluid"></div>
      <div class="col-md-6 order-1 order-md-2 text-center">
        <div class="h1">Diventa revisore</div>
        <p class="lead">Collabora con noi</p>
        <a href="{{route('revisors.request')}}" class="btn bg-btn  ml-3 rounded-pill text-white">Inizia subito</a>

      </div>
    </div>
  </div>


</x-layout>