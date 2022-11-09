<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->string("nome");
            $table->string("val");
            $table->string("email");
            $table->string("phone1")->nullable();
            $table->string("phone2")->nullable();
            $table->string("adress")->nullable();
            $table->string("zipcode")->nullable();
            $table->string("city")->nullable();
            $table->foreignId("costumer_id");



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
};
