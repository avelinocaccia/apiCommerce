<?php   
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model{
    

     
    public function clients(){
        return $this->belongsToMany(Client::class);
    }
}