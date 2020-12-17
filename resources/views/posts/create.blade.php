<x-layout>
    <div class="container">
        {{-- <div class="row">
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
        </div> --}}
        <div class="row">
            <div class="col-12"><h1 class="text-center mt-4">Inserisci il tuo annuncio</h1></div>
            
        </div>
        
        @if (session('message'))
        <div class="toast" data-autohide="false">
            <div class="toast-body d-flex align-items-center">
                <i class="far fa-check-circle"></i> &nbsp; {{ session('message') }}
            </div>
        </div>   
        @endif
        
        
    </div>
    
    {{--         <div class="row">
        <div class="col-12">
            @if (session('message'))
            <div class="alert alert-success">
                <ul>
                    <li>{{session('message')}}</li>
                </ul>   
            </div>
            @endif
        </div>
    </div>  --}}
    <div class="container-fluid">
    <div class="row">
        <div class="col-md-6 mx-auto px-5">
            <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="uniqueSecret" value="{{$uniqueSecret}}">
                <div class="form-group">
                    <label for="title">{{ __('ui.Titolo_annuncio') }}</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" aria-describedby="title" name="title" value="{{old('title')}}">
                    @error('title')
                    <small class="error text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">{{ __('ui.Descrizione_annuncio') }}</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" rows="3" name="description">{{old('description')}}</textarea>
                    @error('description')
                    <small class="error text-danger">{{ $message }}</small>
                    @enderror
                </div>
                
                <div class="row">
                    <div class="col">
                        <label for="price">{{ __('ui.Prezzo') }}</label>
                        <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" aria-describedby="price" name="price" value="{{old('price')}}">
                        @error('price')
                        <small class="error text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="categories">{{ __('ui.Categoria') }}</label>
                        <select class="form-control" id="categories" name="category_id">
                            @foreach ($categories as $category)
                            <option value="{{$category->id}}" {{ old('category_id') == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                            
                            @endforeach
                        </select>
                    </div>
                </div>
                
                
                <div class="form-group">
                    
                    <label class="mt-3" for="image">{{ __('ui.Immagine') }}</label>
                    <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" aria-describedby="image" name="image" value="{{old('image')}}">
                    @error('image')
                    <small class="error text-danger">{{ $message }}</small>
                    @enderror
                </div>
                
                <div class="form-group row">
                    <label for="images" class="col-md-12 col-form-label">{{ __('ui.Immagini') }}</label>
                    <div class="col-md-12">
                        <div class="dropzone" id="drophere"></div>
                        @error('images')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn bg-btn rounded-pill text-white">{{ __('ui.Pubblica') }}</button>
            </form>
            
        </div>
        
    </div>
</div>  
</x-layout>