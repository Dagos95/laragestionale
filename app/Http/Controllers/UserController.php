<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use App\Http\Requests\UserRequest;

use App\Http\Requests\UserUpdateRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = User::query();
        
        if($request->filled('first_name')){
            $query->where('first_name', 'like', '%' . $request->input('first_name') . '%');
        }
        
        if($request->filled('last_name')){
            $query->where('last_name', 'like', '%' . $request->input('last_name') . '%');
        }
        
        if($request->filled('email')){
            $query->where('email', 'like', '%' . $request->input('email') . '%');
        }
        
        if($request->filled('_orderby')){
            $query->orderBy($request->input('_orderby'), $request->input('_order'));  // Permette di ordinare i valori dei campi tramite le freccette
        }
            
        
        $items = $query->paginate();  // Dentro la parentesi sì può decidire il numero di righe che si vuole far vedere per pagina
        
        return view('user/index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $instance)
    {
        return view('user/form', compact('instance'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request, User $instance) // Andrà a prendere la classe dentro App > Http > Requests > UserRequest.php
    {
       $instance->fill($request->except('password'));
       $instance->password = bcrypt($request->password);
       $instance->save();
       return redirect()->action('UserController@index', $instance->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $instance)
    {
       return view('user/form', compact('instance'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, User $instance)
    {

          $instance->fill($request->except('password'));
            if($request->filled('password')){
              $instance->password = bcrypt($request->password);
            }
       $instance->save();
        
       return redirect()->action('UserController@edit', $instance->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $instance)
    {
        //
    }
}
