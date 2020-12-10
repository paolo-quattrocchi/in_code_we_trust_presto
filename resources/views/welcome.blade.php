<x-layout>
  <div class="container">
    <div class="row">
      <div class="col-12">
        @if (session('access.denied.revisor.only'))
        <div class="alert alert-danger">
          <ul>
            <li>{{session('access.denied.revisor.only')}}</li>
          </ul>   
        </div>
        @endif
      </div>
    </div> 
    
  </div>
    <!-- Full Page Image Header with Vertically Centered Content -->
<header class="masthead">
  <div class="overlay"></div>
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-12 text-center">
          <h1 class="font-weight-light">Vertically Centered Masthead Content</h1>
          <p class="lead">A great starter layout for a landing page</p>
        </div>
      </div>
    </div>
  </header>
  
</x-layout>