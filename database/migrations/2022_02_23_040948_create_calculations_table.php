<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalculationsTable extends Migration
{
    
    public function up()
    {
        Schema::create('calculations', function (Blueprint $table) {
            $table->id();
            $table->string('fromarea');
            $table->string('destination');
            $table->string('serviceItem');
            $table->string('weight');
            $table->string('totalCost');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('calculations');
    }
}
