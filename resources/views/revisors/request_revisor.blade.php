<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <p>Autore: {{Auth::user()->name}}</p>
                <p>Email: {{Auth::user()->email}}</p>
            <form action="{{route('revisors.send.request')}}" method="POST">
                    @csrf
                    
                      <input type="hidden" name="name" value="{{Auth::user()->name}}">
                      <input type="hidden" name="email" value="{{Auth::user()->email}}">
                    <div class="form-group">
                      <label for="message">Inserisci messaggio di richiesta</label>
                      <textarea class="form-control" id="message" rows="3" name="message"></textarea>

                    </div>
                    
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
            </div>
        </div>
    </div>
</x-layout>