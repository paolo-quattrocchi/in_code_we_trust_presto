<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>{{$post->title}}</h1>
                <p class="card-text">{{$post->price}} €</p>
                <img src="{{Storage::url($post->image)}}" class="card-img-top" alt="{{$post->title}}">
                <p class="card-text">{{$post->description}}</p>
                <p class="card-text">{{$post->created_at}}</p>                        
                <p class="card-text">{{$post->category->name}}</p>                        
            </div>
        </div>
    </div>
</x-layout>