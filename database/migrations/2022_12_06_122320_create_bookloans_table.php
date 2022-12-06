<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookloansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookloans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('book_id');
            $table->string('unique_stud_id');
            $table->date('loan_date');
            $table->date('return_date');
            $table->timestamps();
        });

        Schema::table('bookloans', function($table){
            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
            $table->foreign('unique_stud_id')->references('unique_id')->on('students')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookloans');
    }
}
