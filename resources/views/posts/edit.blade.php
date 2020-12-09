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
            <div class="col-12">
                <form action="{{route('posts.update', compact('post'))}}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                      <label for="title">Titolo del post</label>
                      <input type="text" class="form-control" id="title" name="title" aria-describedby="title" value="{{$post->title}}" placeholder="Titolo del post">
                    </div>
                    <div class="form-group">
                      <label for="description">Descrizione</label>
                      <textarea class="form-control" id="description" name="description" rows="3" placeholder="Descrizione">{{$post->description}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="price">Prezzo</label>
                        <input type="text" class="form-control" id="price" aria-describedby="price" name="price">
                    </div>
                    <div class="form-group">
                        <label for="categories">Seleziona categoria</label>
                        <select class="form-control" id="categories" name="category_id">
                            @foreach ($categories as $category)
                            <option value="{{$category->id}}" {{ old('category_id') == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                            
                            @endforeach
                        </select>
                    </div>
                    
                      <button type="submit" class="btn btn-primary">Modifica</button>
                </form> 
            </div>
        </div>
    </div>
</x-layout>