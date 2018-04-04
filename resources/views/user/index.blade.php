@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Utenti</div>
        
        <div class="card-body">
           
           <form method="get" action="{{ action('UserController@index') }}">
           
            <table class="table table-bordered table-striped yable-hover">
                <thead>
                    <tr>
                        <th>
                           
                           @component('components/sort-link', [ 'name' => 'first_name' ])
                              Firstname
                           @endcomponent
                           
                        </th>
                        <th>
                            
                            @component('components/sort-link', [ 'name' => 'last_name' ])
                              Lastname
                           @endcomponent
                            
                        </th>
                        <th>
                            
                            @component('components/sort-link', [ 'name' => 'email' ])
                              Email
                           @endcomponent
                            
                        </th>
                        <th></th>
                    </tr>
                </thead>
                
                <thead>
                    <tr>
                        <th><input type="text" class="form-controller" name="first_name" value="{{ request('first_name') }}"></th>
                        <th><input type="text" class="form-controller" name="last_name" value="{{ request('last_name') }}"></th>
                        <th><input type="text" class="form-controller" name="email" value="{{ request('email') }}"></th>
                        <th class="col-action">
                        <button class="btn btn-sm btn-primary" type="submit"><i class="fas fa-search"></i></button>
                        <a class="btn btn-sm btn-warning" href="{{ action('UserController@index') }}"><i class="fas fa-eraser"></i></a>
                        </th>
                    </tr>
                </thead>
                
                <tfoot>
                   <tr>
                       <td colspan="99">{{ $items->appends( request()->all() )}}</td>  <!-- Crea l'impaginazione -->
                   </tr>
                    
                </tfoot>
                
                <tbody>
                  @foreach($items as $item)
                   <tr>
                        <th>{{ $item->first_name }}</th>
                        <th>{{ $item->last_name }}</th>
                        <th>{{ $item->email }}</th>
                    </tr>
                  @endforeach
                </tbody>
      
            </table>
            
            </form>
            
        </div>
    </div>
</div>
@endsection
