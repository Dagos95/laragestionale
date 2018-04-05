@if (session()->has('alert-success'))
  <div class="alert alert-success">      <!-- Permette di creare un allert di successo per il modifica form -->
      {{ session('alert-success') }}
  </div>
@endif