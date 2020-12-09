productsWrapper.innerHTML = ""
dataInput.forEach(prodotto => {
    let nome;
    if (prodotto.name.lenght < 10) {
        nome = prodotto.description
    } else {
        nome = prodotto.description.substr(0,10) + "[...]"
    }
    let div = document.create.Element ('div')
    div.classList.add('col-12' , 'col-md-6' , 'col-lg-4' , 'mb-3')
    div.innerHTML = 
    `
    @foreach ($posts as $post)
    <div class="col-12 col-md-4">
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{$post->title}}</h5>
                <p class="card-text">{{$post->price}} €</p>
                <img src="{{Storage::url($post->image)}}" class="card-img-top img-fluid img-responsive" alt="{{$post->title}}">
                <p class="card-text">{{$post->description}} ${prodotto.description}</p>
                <p class="card-text">{{$post->created_at}}</p>                        
                <p class="card-text">{{$post->category->name}}</p>                        
                <a href="{{route('posts.edit', compact('post'))}}" class="btn btn-primary">Modifica</a>
                <a href="{{route('posts.show', compact('post'))}}" class="btn btn-primary">Visualizza</a>
                <form action="{{route('posts.destroy', compact('post'))}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger"> Cancella</button>
                </form>
            </div>
        </div>
    </div>
    @endforeach
   `
})

