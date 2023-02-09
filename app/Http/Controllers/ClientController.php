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
        $datoCliente->email = $request->input('email');
        $datoCliente->phone = $request->input('phone');
        $datoCliente->address = $request->input('address');
        
        $datoCliente->save();
        $data = [ 'message' => 'Creado con éxito',
                  'client' => $datoCliente ,
                ];
        
    
        return response()->json($data, 201);
        
    }





}
