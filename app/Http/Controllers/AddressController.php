<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Client;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create($clientId)
    {
        $client = Client::findOrFail($clientId);
        return view('address.create', compact('client'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $clientId)
    {
        $client = Client::findOrFail($clientId);

        $validatedData = $request->validate([
            'street' => 'required',
            'number' => 'required',
            'district' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required',
        ]);

        $address = new Address($validatedData);
        $address->client()->associate($client);
        $address->save();

        return redirect()->route('clients.show', $clientId)->with('success', 'Endereço foi criado com sucesso');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('address.edit', ['address' => Address::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'street' => 'required',
            'number' => 'required',
            'district' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required',
        ]);

        $address = Address::find($id);
        $address->fill($validatedData);
        $address->save();

        return redirect()->route('clients.show', $address->client->id)->with('success', 'Endereço foi atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $address = Address::find($id);
        $clientId = $address->client->id;
        $address->delete();

        return redirect()->route('clients.show', $clientId)->with('success', 'Endereço foi deletado com sucesso');
    }
}
