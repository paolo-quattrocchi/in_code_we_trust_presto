<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center text-uppercase">
                <h1 class="my-5">{{$category->name}}</h1>
                
            </div>
            
            @foreach ($category->posts()->get() as $post)
            <div class="col-md-6 col-lg-4">
                <div class="card my-5 shadow">
                  <div class="card-img">
                    <div class="card-price">{{$post->price}} €</div>
                    <img src="{{Storage::url($post->image)}}" class="card-img-top" alt="{{$post->title}}">
                  </div>
                  <div class="card-body">
                    <small> {{$post->category->name}}</small> 
                    <h3 class="card-title">{{$post->title}}</h3>          
                    <p class="trunc card-desc">{{$post->description}}</p>
                    
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
        <div class="row">
            <div class="col-12 mt-5 mb-3">
                
                <h2>{{ __('ui.Altre_categorie') }}</h2>
            </div>
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
</div>
</x-layout>