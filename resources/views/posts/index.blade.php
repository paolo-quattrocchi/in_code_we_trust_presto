<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4">
                @foreach ($posts as $post)
                <div class="card">
                    <img src="{{$post->image}}" class="card-img-top" alt="{{$post->title}}">
                    <div class="card-body">
                        <h5 class="card-title">{{$post->title}}</h5>
                        <p class="card-text">{{$post->description}}</p>
                        <p class="card-text">{{$post->price}}</p>
                        <a href="#" class="btn btn-primary">Visualizza</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div> 
    </div>
</div>
</x-layout>