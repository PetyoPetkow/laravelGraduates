<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGraduateThesesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('graduate_theses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('topic');
            $table->timestamps();
            $table->unsignedBigInteger('teacher_id');
           
            //$table->unsignedBigInteger('student_id');
           
            //$table->foreign('student_id')->references('id')->on('students');
            //$table->unsignedBigInteger('student_id');
           
            
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('graduate_theses');
    }
}
