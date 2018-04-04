<!-- questa funzione permette di riordinare i valori anche dalla seconda pagina (senza ritornare alla pagina 1) -->

@php
  $action = empty($action) ? class_basename( request()->route()->getActionName() ) : $action;
@endphp

<a href="{{ action(
      $action, 
          array_merge(           
              request()->all(), [
                  '_orderby' => $name,
                  '_order' => request()->_order == 'asc' ? 'desc' : 'asc' 
              ]
          )
) }}">
         @if (request()->_orderby != $name)
           <i class="fas fa-sort"></i>

         @elseif (request()->_order == 'asc')
           <i class="fas fa-sort-up"></i>

         @else 
          <i class="fas fa-sort-down"></i>
         @endif
          
          {{ $slot }}
</a>