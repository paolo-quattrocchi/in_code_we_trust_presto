<!-- Navigation -->
<nav class="navbar navbar-expand-xl bg-nav shadow navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="/"><img src="/storage/media/logo.svg" width="50"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon text-white"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ">
        <li class="nav-item active">
          <a class="nav-link text-white " href="/">Home
            <span class="sr-only">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="{{route('posts.index')}}">Vedi gli annunci</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="{{route('posts.create')}}">Pubblica annuncio</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Categorie
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            @foreach ($categories as $category)
            <a class="dropdown-item " href="{{ route('categories.show', compact('category'))}}">{{$category->name}}</a>
            
            
            @endforeach
            
          </div>
        </li>
      </ul>
      <form action="{{route('search')}}" method="GET">
        <input type="text" name="q" placeholder="Cerca" class="search-bar">
        <button class="btn btn-danger" type="submit">Invia</button>
      </form>
      <ul class="navbar-nav ml-auto">
        <!-- Authentication Links -->
        @guest
        @if (Route::has('login'))
        <li class="nav-item">
          <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
        </li>
        @endif
        
        @if (Route::has('register'))
        <li class="nav-item">
          <a class="nav-link text-white" href="{{ route('register') }}">{{ __('Registrati') }}</a>
        </li>
        @endif
        @else
        @if (Auth::user()->is_revisor)
        <li class="nav-item">
          <a class="nav-link" href="{{ route('revisors.index') }}">Area revisore
          <span class="badge badge-pill badge-warning">{{\App\Models\Post::ToBeRevisionedCount()}}</span>
          </a>
        </li>
            
        @endif
        <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->name }}
          </a>
          
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
          </a>
          
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>
        </div>
      </li>
      
      @endguest
      <a href="{{route('posts.create')}}" class="btn bg-btn  ml-3 rounded-pill text-white">Inserisci annuncio</a>
    </ul>
  </div>
</div>
</nav>
