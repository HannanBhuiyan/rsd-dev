<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('fname');
            $table->string('lname');
            $table->string('gender')->nullable();
            $table->string('phone');
            $table->string('shop_address')->nullable();
            $table->string('ecommerce_register_id')->nullable();
            $table->string('fb_page_link')->nullable();
            $table->string('image');
            $table->string('role')->comment('1=admin, 2=moderator, 3=editor, 4=business, 5=personal');
            $table->text('address')->nullable();
            $table->string('code')->nullable();
            $table->string('active')->default(1)->comment('0=inactive, 1=active');
            $table->string('last_seen')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
