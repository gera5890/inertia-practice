<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    return Inertia('Users', [
        'users' => User::query()
        //modificamos la query si tiene un dato search
            ->when(request('search'), function ($query) {
                $query->where('name', 'like', '%' . request('search') . '%');
            })
            //paginamos la query modificada
            ->paginate(5)
            //ponemos esto para no perder el search cuando cambia de pagina 
            ->withQueryString()
            //esto es para mandar solo estos datos con el paginate en lugar de un map
            ->through(fn ($user) => [
                'id' => $user->id,
                'email' => $user->email,
                'name' => $user->name
            ]),
            //mandamos filters para el valor de nuestro search en el front para que no desaparezca en nuestro input
            'filters' => [request('search')]
    ]);
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
