<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Services extends Migration{
    
    public function up(){
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->nullable;
            $table->integer('price');
            $table->timestamps();
        });
    }

    public function down(){
        Schema::dropIfExists('services');
    }
}