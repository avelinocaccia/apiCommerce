<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    public function index(){
    
        $clients = Client::get();
        $array = [];
        foreach ($clients as $client){
            $servicesASC = $client->services()->orderBy('id','asc')->get();
            $array[] = [
                'id' => $client->id,
                'name' => $client->name,
                'email' => $client->email,
                'phone' => $client->phone,
                'address' => $client->address,
                'services' => $servicesASC
            ];
        }
        return response()->json($array);
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
        $data = [ 'message' => 'actualizado con éxito',
                  'client' => $clientes ,
                ];
        
    
        return response()->json($data, 204);
   
    }
  

    public function destroy(Request $request, $id){
        $client = Client::find($id);
        $client->delete();
        $data = [
            'message' => 'cliente eliminado',
            'client' => $client    
        ];


        return response()->json($data, 410);
    }


    public function attach(Request $request){
        $client = Client::find($request->client_id);
        $client->services()->attach($request->service_id);
        $data = [
            'message' => 'service attached successfully',
            'client' => $client    
        ];


        return response()->json($data);
    }


    public function dettach(Request $request){
        $client = Client::find($request->client_id);
        $client->services()->detach($request->service_id);
        $data = [
            'message' => 'service dettached successfully',
            'client' => $client,
            'servicio eliminado' => $client->services   
        ];


        return response()->json($data);
    }




}
