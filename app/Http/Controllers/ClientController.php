<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::all();
        return view('client.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('client.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|unique:clients,name',
            'email' => 'required|email|unique:clients,email',
            'phone_number' => 'required|celular_com_ddd',
            'account_type' => 'required',
            'cpf_cnpj' => 'required|unique:clients,cpf_cnpj|formato_cpf_ou_cnpj|cpf_ou_cnpj',
        ]);

        $client = Client::create($validatedData);
        return redirect()->route('clients.address.create', $client->id)->with('success', 'Cliente foi criado com sucesso');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $client = Client::find($id);
        return view('client.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('client.edit', ['client' => Client::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone_number' => 'required|celular_com_ddd',
            'account_type' => 'required',
            'cpf_cnpj' => 'required|formato_cpf_ou_cnpj|cpf_ou_cnpj',
        ]);

        Client::whereId($id)->update($validatedData);

        return redirect('/clients')->with('success', 'Cliente foi atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Client::destroy($id);
        return redirect('/clients')->with('success', 'Cliente foi deletado com sucesso');
    }
}
