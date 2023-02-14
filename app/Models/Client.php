<?php   
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model{
    
    
    public function services(){
        return $this->belongsToMany(Service::class, 'clients_services');
    }
}