<x-layout>
    <div class="container vh-100">
        <div class="row">
            <div class="col-12">
                @if (session('message'))
                    <div class="alert alert-success text-center">
                        {{session('message')}}
                    </div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-center">
                <form action="{{route('posts.update', compact('post'))}}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                      <label for="title">Titolo del post</label>
                      <input type="text" class="form-control" id="title" name="title" aria-describedby="title" value="{{$post->title}}" placeholder="Titolo del post">
                    </div>
                    <div class="form-group">
                      <label for="description">Testo</label>
                      <textarea class="form-control" id="description" name="description" rows="3" placeholder="Descrizione">{{$post->description}}</textarea>
                    </div>
                    
                      <button type="submit" class="btn btn-primary">Modifica</button>
                </form> 
            </div>
        </div>
    </div>
</x-layout>