@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Utenti</div>
        
        <div class="card-body">
           
           <form method="get" action="{{ action('UserController@index) }}">
           
            <table class="table table-bordered table-striped yable-hover">
                <thead>
                    <tr>
                        <th>First name</th>
                        <th>Last name</th>
                        <th>Email</th>
                    </tr>
                </thead>
                
                <thead>
                    <tr>
                        <th><input type="text" class="form-controller" name="first_name" value="{{ request('first_name') }}"></th>
                        <th><input type="text" class="form-controller" name="last_name" value="{{ request('last_name') }}"></th>
                        <th><input type="text" class="form-controller" name="email" value="{{ request('email') }}"></th>
                        <th><button class="btn btn-sm" type="button">Cerca</button></th>
                    </tr>
                </thead>
                
                <tfoot>
                    {{ $items->links() }}
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
