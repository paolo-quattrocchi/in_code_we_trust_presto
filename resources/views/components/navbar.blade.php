<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light shadow">
    <div class="container-fluid">
      <a class="navbar-brand" href="/"></a>
      
        <a href="/">
        <span class="fa-stack fa-2x">
          <i class="fal fa-bolt fa-stack-1x bg-nav"></i>
        </span>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="/">Home
                  <span class="sr-only">(current)</span>
                </a>
          </li>
          <li class="nav-item">
          <a class="nav-link" href="{{route('posts.index')}}">Vedi gli annunci</a>
          </li>
          <li class="nav-item">
          <a class="nav-link" href="{{route('posts.create')}}">Pubblica annuncio</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Categorie
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              @foreach ($categories as $category)
              <a class="dropdown-item" href="{{ route('categories.show', compact('category'))}}">{{$category->name}}</a>
              
              
              @endforeach
              
            </div>
          </li>
        </ul>
        <form>
          <input type="text" name="search" placeholder="Cerca">
        </form>
        <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @guest
                @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @endif
                
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Registrati') }}</a>
                    </li>
                @endif
            @else
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
                <a href="{{route('posts.create')}}" class="btn btno btn-primary ml-3 rounded-pill text-dark">Inserisci annuncio</a>
        </ul>
      </div>
    </div>
  </nav>
  <style>
    .bg-nav{
      color:rgb(07, 11,134);
    }

    .btno{
     background:rgb(214, 218, 10);
     
    }
  
    .btno:hover {
    background-color: green;
    text-decoration: none;
  }
  nav{
    background: rgb(0, 148, 221);
  }
    </style>