<?php

use Facade\Ignition\Tabs\Tab;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParcelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parcels', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('auth_id');
            $table->string('email');
            $table->unsignedBigInteger('role');
            $table->integer('delete_id')->default(0);
            $table->text('fromarea');
            $table->text('toarea');
            $table->integer('weight');
            $table->text('PorductitemName');
            $table->text('recipientName');
            $table->text('recipientPhone');
            $table->text('recipientAdd');
            $table->text('recipientnote');
            $table->text('invoice_no');
            $table->integer('totalcosts');
            $table->text('status')->default('pending');
            $table->string('month');
            $table->softDeletes();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parcels');
    }
}
