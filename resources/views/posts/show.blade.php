<x-layout>
  
  <div class="container">
    <div class="row" style="margin-top: 100px">
      <div class="col-md-6">      
        <img src="{{Storage::url($post->image)}}" class="img-fluid" alt="{{$post->title}}" style="max-height: 600px">
        
        <div class="slider mt-2">
          @foreach ($post->images as $image)
          <img src="{{$image->getUrl(450, 300)}}">
          @endforeach
        </div>      
      </div>
      
      <div class="col-md-6">
        <small>{{$post->category->name}}</small> 
        <h1 class="mb-2 title-show">{{$post->title}}</h1>
        <p><i class="far fa-clock"></i> {{$post->created_at->format('d M Y')}} &nbsp;|&nbsp; <i class="far fa-user"></i> {{$post->user->name}}</p>
        <div class="card-price">{{$post->price}} €</div>
        <p class="mt-4">{{$post->description}}</p>
        <div class="row no-gutters">

          @if (Auth::id() == $post->user->id)
          <div class="col-6 text-center">
            <a href="{{route('posts.edit', compact('post'))}}" class="btn bg-btn rounded-pill text-white">{{ __('ui.Modifica') }}</a>
          </div>  
          
          <div class="col-6 text-center">
            <form action="{{route('posts.destroy', compact('post'))}}" method="POST">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger rounded-pill text-white mt-2">{{ __('ui.Cancella') }}</button>
            </form>
          </div>
        </div>              
        @endif
        
        
      </div>
    </div>
  </div>
  
  
  
  
  <x-slot name="scripts">
    <script>
      $('.slider').slick({
        centerMode: true,
        centerPadding: '40px',
        slidesToShow: 2,
        dots: true,
        responsive: [
        {
          breakpoint: 768,
          settings: {
            arrows: false,
            centerMode: true,
            centerPadding: '40px',
            slidesToShow: 2
          }
        },
        {
          breakpoint: 480,
          settings: {
            arrows: false,
            centerMode: true,
            centerPadding: '40px',
            slidesToShow: 1
          }
        }
        ]
      });
    </script>
  </x-slot>
</x-layout>