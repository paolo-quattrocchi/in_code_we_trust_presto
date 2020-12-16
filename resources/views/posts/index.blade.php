<x-layout>
    <div class="container bg-index">
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
                        
                        
                       {{--  @if (Auth::id() == $post->user->id)
                        
                        <a href="{{route('posts.edit', compact('post'))}}" class="btn bg-btn rounded-pill text-white">{{ __('ui.Modifica') }}</a>
                        
                        <form action="{{route('posts.destroy', compact('post'))}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger rounded-pill text-white mt-2">{{ __('ui.Cancella') }}</button>
                        </form>
                        
                        @endif --}}
                        
                        
                        
                    </div>
                </div>
            </div>
            @endforeach
        </div> 
    </div>
</div>
</x-layout>