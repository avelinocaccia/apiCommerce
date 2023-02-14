<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;


class ServiceController extends Controller{

    public function store(Request $request){
    
        $service = new Service;
        $service->name = $request->name;
        $service->description = $request->description;
        $service->price = $request->price;

        $service->save();
        $data = [ 'message' => 'Creado con éxito',
                  'client' => $service ,
                ];
        
    
        return response()->json($data, 201);
    }

    public function index (){
        $servicios = Service::all();
        return response()->json($servicios);
    
    }

    public function getQueryByName($query){
        $data = Service::where('name', $query)->get();
        return response()->json($data, 200);
    }
 
        public function show($id) {
            $service = Service::find($id);
            return response()->json($service, 200);
        }
        
        public function update(Request $request, $id){
            $Service = Service::find($id);
            $Service->name = $request->name;
            $Service->description = $request->description;
            $Service->price = $request->price;
            $Service->save();
    
           
            $data = [ 'message' => 'actualizado con éxito',
                      'servicio' => $Service ,
                    ];
            
        
            return response()->json($data, 204);
       
        }
      

    
        public function destroy(Request $request, $id){
            $Service = Service::find($id);
            $Service->delete();
            $data = [
                'message' => 'cliente eliminado',
                'servicio' => $Service    
            ];
    
    
            return response()->json($data, 410);
        }

}