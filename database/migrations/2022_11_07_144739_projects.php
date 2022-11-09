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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->foreignId("user_id")->constrained();
            $table->dateTime("deadline")->nullable();
            $table->decimal("estimate", 6, 2)->nullable();


        });

        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->foreignId("project_id")->constrained();
            $table->string("nome");
            $table->text("description")->nullable();
        });


        Schema::create('project_user', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->foreignId("user_id")->constrained();
            $table->foreignId("project_id")->constrained();
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_user');
        Schema::dropIfExists('tasks');
        Schema::dropIfExists('projects');

    }
};
