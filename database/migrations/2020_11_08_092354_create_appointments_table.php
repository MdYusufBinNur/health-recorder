<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hospital_id');
            $table->unsignedBigInteger('doctor_id');
            $table->unsignedBigInteger('user_id');
            $table->string('patient_name');
            $table->longText('patient_address');
            $table->string('patient_contact');
            $table->double('patient_age')->default(10);
            $table->time('time')->nullable();
            $table->date('date')->nullable();
            $table->string('status')->default('pending');
            $table->timestamps();

            $table->foreign('doctor_id')
                ->on('doctors')
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
        Schema::dropIfExists('appointments');
    }
}
