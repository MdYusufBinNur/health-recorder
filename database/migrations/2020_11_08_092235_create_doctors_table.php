<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('department_id');
            $table->unsignedBigInteger('hospital_id');
            $table->unsignedBigInteger('user_id');
            $table->string('name');
            $table->string('designation');
            $table->double('fee')->default(300);
            $table->string('day')->nullable();
            $table->string('image')->nullable();
            $table->string('rating')->default(0);
            $table->timestamps();

            $table->foreign('department_id')
                ->on('departments')
                ->references('id')
                ->onDelete('cascade');

            $table->foreign('hospital_id')
                ->on('hospitals')
                ->references('id')
                ->onDelete('cascade');

            $table->foreign('user_id')
                ->on('users')
                ->references('id')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctors');
    }
}
