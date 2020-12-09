<x-layout>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container py-5">
    <div class="row h100 align-items-center">
        <div class="col-8">
            <h1 class="text-first">Paolo Quattrocchi</h1>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-12 col-md-4">
            <img class="img-fluid d-block mx-auto mt-3" src="https://picsum.photos/200/200" alt="">
        </div>
        <div class="col-12 col-md-8">
            <p class="text-second font-weight-bold h5 mt-3">Paolo Quattrocchi</p>
            <p class="text-first font-weight-bold mb-0">Iscritto dal: <span class="text-secondary">12/12/12</span></p>
            <p class="text-first font-weight-bold mb-5">Media feedback: <span title="Positivo" class="text-secondary">4/5</span></p>
            <p class="text-second font-weight-bold h5">Biografia</p>
            <p class="text-secondary mb-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus quis, pariatur tempora sapiente omnis accusantium odio nihil ab esse blanditiis, totam ipsa suscipit rem libero placeat similique. At, aliquam deleniti!</p>
            <p class="text-second font-weight-bold h5">Contatti</p>
            <p>
                <i class="fas fa-phone fa-rotate-90"></i>
                <a class="text-first text-decoration-none" href="tel:">1234567890</a>
            </p>
            <p>
                <i class="fas fa-envelope"></i>
                <a class="text-first text-decoration-none" href="mailto:">mail@presto.it</a>
            </p>
            <p>
                <i class="fas fa-map-pin mr-2"></i>
                <a class="text-first text-decoration-none" href="mailto:">Catania</a>
            </p>
        </div>
    </div>
</div>

<div class="container my-5 py-5">
    <div class="row">
        <div class="col-8 pb-5">
            <p class="text-second font-weight-bold h5">Ultimi annunci</p>
        </div>
        <div class="col-4 pb-5">
            <a href="">
                <button type="button" class="btn btn-dark rounded float-right">Vendi</button>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-6 col-lg-4 mb-3">
            <div class="card shadow">
                <div class="over-card">
                    <a href=""><img src="https://picsum.photos/200/200" class="card-img-top img-fluid over-img" alt="old lady"></a>
                </div>
                <div class="card-body text-left text-left">
                    <h5 class="card-title text-secondary">Elettronica</h5>
                    <p>Modem</p>
                    <p>Asusu 320</p>
                    <p>40$</p>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4 mb-3">
            <div class="card shadow">
                <div class="over-card">
                    <a href=""><img src="https://picsum.photos/200/200" class="card-img-top img-fluid over-img" alt="old lady"></a>
                </div>
                <div class="card-body text-left text-left">
                    <h5 class="card-title text-secondary">Elettronica</h5>
                    <p>Modem</p>
                    <p>Asusu 320</p>
                    <p>40$</p>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4 mb-3">
            <div class="card shadow">
                <div class="over-card">
                    <a href=""><img src="https://picsum.photos/200/200" class="card-img-top img-fluid over-img" alt="old lady"></a>
                </div>
                <div class="card-body text-left text-left">
                    <h5 class="card-title text-secondary">Elettronica</h5>
                    <p>Modem</p>
                    <p>Asusu 320</p>
                    <p>40$</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container my-5 py-5">
    <div class="row">
        <div class="col-12 pb-5">
            <p class="text-second font-weight-bold h5">I tuoi annunci</p>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <table class="table table-responsive">
                <thead class="bg-first text-white">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome annuncio</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Caricato il</th>
                        <th scope="col">Status</th>
                        <th scope="col">Offerte</th>
                        <th scope="col">Link</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Fiat 600</td>
                        <td>Auto</td>
                        <td>12/12/12</td>
                        <td>Buone condizioni</td>
                        <td>4</td>
                        <td><a href=""><i class="far fa-external-link"></i></a></td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>TV Bravia SONY</td>
                        <td>Elettronica</td>
                        <td>02/03/04</td>
                        <td>Senza confezione originale</td>
                        <td>17</td>
                        <td><a href=""><i class="far fa-external-link"></i></a></td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Polo Lacoste</td>
                        <td>Abbigliamento</td>
                        <td>05/09/10</td>
                        <td>Scolorita</td>
                        <td>7</td>
                        <td><a href=""><i class="far fa-external-link"></i></a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="container my-5 py-5">
    <div class="row">
        <div class="col-12 pb-5">
            <p class="text-second font-weight-bold h5">Prodotti controllati</p>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <table class="table table-responsive">
                <thead class="bg-first text-white">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome utente</th>
                        <th scope="col">Nome annuncio</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Prezzo</th>
                        <th scope="col">Caricato il</th>
                        <th scope="col">Status</th>
                        <th scope="col">Link</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Simplicio</td>
                        <td>Fiat 600</td>
                        <td>Auto</td>
                        <td>2000 $</td>
                        <td>12/12/12</td>
                        <td><i class="fas fa-check text-success"></i></td>
                        <td><a href=""><i class="far fa-external-link"></i></a></td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Sagredo</td>
                        <td>TV Bravia SONY</td>
                        <td>Elettronica</td>
                        <td>300 $</td>
                        <td>02/03/04</td>
                        <td><i class="fas fa-times text-danger"></i></td>
                        <td><a href=""><i class="far fa-external-link"></i></a></td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Salviati</td>
                        <td>Polo Lacoste</td>
                        <td>Abbigliamento</td>
                        <td>50 $</td>
                        <td>05/09/10</td>
                        <td><i class="fal fa-hourglass text-warning"></i></td>
                        <td><a href=""><i class="far fa-external-link"></i></a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-12">
            <p class="text-second font-weight-bold h5 pb-5">L'annuncio ha questi punteggi</p>
        </div>
    </div>
    <div id="scoresWrapper" class="row">

    </div>
    <div class="row mt-3">
        <div class="col-12 text-right">
            <button class="btn-success btn-lg px-5">
                <i class="fas fa-check text-light mr-2"></i>Accetta
            </button>
            <button class="btn-danger btn-lg px-5">
                <i class="fas fa-times text-light mr-2"></i>Rifiuta
            </button>
        </div>
    </div>
</div>

{{-- <div class="container my-5 py-5">
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
</div> --}}
</x-layout>
