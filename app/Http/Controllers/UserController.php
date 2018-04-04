<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(User $instance)
    {
        //
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
