@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
           Utenti
           <a href="{{ action('UserController@create') }}" class="btn btn-sm btn-primary float-right">
               <i class="fas fa-plus"></i>
           </a>
        </div>
        
        <div class="card-body">
         
         <form method="get" action="{{ action('UserController@index') }}" class="mb-4">
            
            <div class="row">
              <div class="col-md-4">
                 <div class="form-group">
                    <input type="text" class="form-control" name="first_name" value="{{ request('first_name') }}" placeholder="Frst name">
                 </div>
              </div>
              
            <div class="col-md-4">
                <div class="form-group">
                    <input type="text" class="form-control" name="last_name" value="{{ request('last_name') }}" placeholder="Last name">
                </div>
            </div>
                       
            <div class="col-md-4">
                <div class="form-group">
                    <input type="text" class="form-control" name="email" value="{{ request('email') }}" placeholder="Email">
                </div>
            </div>
        </div>   
                        <button class="btn btn-sm btn-primary" type="submit"><i class="fas fa-search"></i></button>
                        <a class="btn btn-sm btn-warning" href="{{ action('UserController@index') }}"><i class="fas fa-eraser"></i></a>
            </form>            
             
          
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
                        <th class="col-action"><a href="{{ action('UserController@edit', [$item->id]) }}" class="btn btn-secondary pull-right btn-sm"> 
                        <i class="fas fa-pencil-alt"></i>
                        </a>
                        
                        @if ($item->id != auth()->id())
                         <form action="{{ action('UserController@destroy', [$item->id]) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('delete') }} 
                           <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
                        </form>
                        
                        @endif
                        </th>
                    </tr>
                  @endforeach
                </tbody>
        
             </table>
            
        </div>
    </div>
</div>
@endsection
