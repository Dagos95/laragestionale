<div class="card">
   @if (!empty($header))
     <div class="card-header">
        {{ $header }}
     </div>
   @endif

    
    <div class="card-body">
        {{ $slot }}
    </div>
</div>