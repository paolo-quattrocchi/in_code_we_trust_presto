<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-12">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                @if (session('message'))
                <div class="alert alert-success">
                    <ul>
                        <li>{{session('message')}}</li>
                    </ul>   
                </div>
                @endif
            </div>
        </div> 
    </div>
    <form action="{{route('posts.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Titolo dell'annuncio</label>
            <input type="text" class="form-control" id="title" aria-describedby="title" name="title">
        </div>
        <div class="form-group">
            <label for="description">Descrizione dell'annuncio</label>
            <textarea class="form-control" id="description" rows="3" name="description"></textarea>
        </div>
        <div class="form-group">
            <label for="price">Prezzo</label>
            <input type="text" class="form-control" id="price" aria-describedby="price" name="price">
        </div>
        <div class="form-group">
            <label for="categories">Seleziona categoria</label>
            <select class="form-control" id="categories" name="category">
                @foreach ($categories as $category)
                <option value="{{$category->id}}" {{ old('category') == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                
                @endforeach
            </select>
        </div>
        
    {{--     <div class="form-group">
            <label for="image">Carica immagine</label>
            <input type="file" class="form-control" id="image" aria-describedby="image" name="image">
        </div> --}}
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    
</x-layout>