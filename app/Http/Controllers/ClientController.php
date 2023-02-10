<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    public function index(){
    
        $clients = Client::all();
        return response()->json($clients);
    }

    public function store(Request $request){
        $datoCliente = new Client;
        $datoCliente->name = $request->input('name');
        //$datoCliente->name = $request->name; otra forma de insertar los datos por request
        $datoCliente->email = $request->input('email');
        $datoCliente->phone = $request->input('phone');
        $datoCliente->address = $request->input('address');
        
        $datoCliente->save();
        $data = [ 'message' => 'Creado con éxito',
                  'client' => $datoCliente ,
                ];
        
    
        return response()->json($data, 201);
        
    }

    public function show(Client $client){
        return response()->json($client);
    
    }

    public function update(Request $request, Client $client){
        
        $client->name = $request->name;
        $client->email = $request->email;
        $client->phone = $request->phone;
        $client->address = $request->address;
        $client->save();
        $data = [
            'message' => 'cliente actualizado correctamente',
            'client' => $client    
        ];
        return response()->json($data);
    }




}
