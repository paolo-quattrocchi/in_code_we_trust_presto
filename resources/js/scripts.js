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
let scores = {
    "Violenza": 32,
    "Razzismo": 12,
    "Sangue": 50,
    "Contenuto medico": 70,
    "Contenuto per adulti": 55,
}

let scoresArray = Object.entries(scores).sort((a, b) => b[1] - a[1])
console.log(scoresArray)

let scoresWrapper = document.querySelector('#scoresWrapper')

scoresArray.forEach(el => {

    let color;

    if (el[1] < 34) {
        color = "success"
    } else if (el[1] < 67) {
        color = "warning"
    } else {
        color = "danger"
    }

    let div = document.createElement('div')
    div.classList.add('col-12', 'my-2')
    div.innerHTML =


        `
       <p>${el[0].toUpperCase()}: ${el[1]}</p>
       <div class="progress">
          <div class="progress-bar bg-${color}" role="progressbar" style="width: ${el[1]}%"></div>
       </div>

       `
})

