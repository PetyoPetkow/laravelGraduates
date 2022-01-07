<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id')->unique();
            $table->string('name')->unique();
            $table->string('faculty_number')->unique();
            $table->timestamps();

            $table->unsignedBigInteger('graduate_thesis_id')->unique()->nullable();
           
            $table->foreign('graduate_thesis_id')->references('id')->on('graduate_theses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students'); 
    }
}
