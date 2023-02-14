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

    public function show($id) {
    $client = Client::find($id);
    return response()->json($client, 200);
    }
    
    public function update(Request $request, $id){
        $clientes = Client::find($id);
        $clientes->name = $request->name;
        $clientes->email = $request->email;
        $clientes->phone = $request->phone;
        $clientes->address = $request->address;
        $clientes->save();

        $clientes->save();
        $data = [ 'message' => 'actualizado con éxito',
                  'client' => $clientes ,
                ];
        
    
        return response()->json($data, 200);
   
    }
  



        
  


    public function destroy(Client $client){
        $client->delete();
        $data = [
            'message' => 'cliente eliminado',
            'client' => $client    
        ];
    }


}
