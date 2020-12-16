<x-layout>
    

 
<div class="container py-5">
    <div class="row h100 align-items-center">
        <div class="col-8">
            <h1 class="text-first">{{Auth::user()->name}}</h1>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-12 col-md-4">
            <img class="img-fluid d-block mx-auto mt-3" src="https://picsum.photos/200/200" alt="">
        </div>
        <div class="col-12 col-md-8">
            <p class="text-second font-weight-bold h5 mt-3">{{Auth::user()->name}}</p>
            <p class="text-first font-weight-bold mb-0">Iscritto dal: <span class="text-secondary">{{Auth::user()->created_at->format('d-m-Y')}}</span></p>
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



  @if ($post)
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-12">
              <div class="card">
                  <div class="card-header">Annuncio # {{$post->id}}
  
                  </div>
                  <div class="card body">
                      <div class="row">
                          <div class="col-md-2"><h3>Utente</h3>
  
                          </div>
                          <div class="col-md-10">
                              # {{$post->user->id}},
                              {{$post->user->name}},
                              {{$post->user->email}},
                          </div>
                      </div>
                      <hr>
                      <div class="row">
                          <div class="col-md-2"><h3>Titolo</h3>
                              
                          </div>
                          <div class="col-md-10">
                              {{$post->title}}
                          </div>
                      </div>
                      <hr>
                      <div class="row">
                          <div class="col-md-2"><h3>Descrizione</h3>
                              
                          </div>
                          <div class="col-md-10">
                              {{$post->description}}
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>




<div class="row">
    @foreach ($post->images as $image)
    <div class="col-md-4">
        <div><img src="{{$image->getUrl(450, 300)}}"></div>
        
    </div>

    <div class="col-md-8">
        Adult: {{$image->adult}} <br>
        Spoof: {{$image->spoof}} <br>
        Medical: {{$image->medical}} <br>
        Violence: {{$image->violence}} <br>
        Racy: {{$image->racy}} <br>
        {{$image->id}} <br>
        {{$image->file}} <br>
        {{Storage::url($image->file)}} <br>

        <b>Labels</b><br>
        <ul>
            @if ($image->labels)
                @foreach ($image->labels as $label)
                    <li>{{$label}}</li>
                @endforeach
            @endif
        </ul>
    </div>
    @endforeach
</div>












      <div class="row justify-content-center mt-5">
        <div class="col-md-6">
        <form action="{{route('revisors.reject' , $post->id)}}" method="POST">
        @csrf
        <button type="submit" class="btn btn-danger">Rifiuta</button>
        </form>
        </div>
  
        <div class="col-md-6">
          <form action="{{route('revisors.accept' , $post->id)}}" method="POST">
          @csrf
          <button type="submit" class="btn btn-success">Accetta</button>
          </form>
          </div>
          
      </div>
  </div>
  @else
  <h3 class="text-center">Non ci sono annunci de revisionare</h3>
  @endif


  
</x-layout>