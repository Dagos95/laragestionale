@if (session()->has('alert-success'))
  <div class="alert alert-success">      <!-- Permette di creare un allert di successo per il modifica form -->
      {{ session('alert-success') }}
  </div>
@endif



@if (session()->has('alert-info'))
  <div class="alert alert-info">      <!-- Permette di creare un allert di successo per il modifica form -->
      {{ session('alert-info') }}
  </div>
@endif


@if (session()->has('alert-warning'))
  <div class="alert alert-warning">      <!-- Permette di creare un allert di successo per il modifica form -->
      {{ session('alert-warning') }}
  </div>
@endif