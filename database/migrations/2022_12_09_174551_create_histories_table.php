<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

     /*

    'student_name',
    'book_name',
    'date_borrow',
    'date_return',
    'penaltyCharge'

     */
    public function up()
    {
        Schema::create('histories', function (Blueprint $table) {
            $table->id();
            $table->string('student_name');
            $table->string('book_name');
            $table->integer('student_years');
            $table->date('date_borrow');
            $table->date('date_return')->nullable();
            $table->float('penaltyCharge')->nullable();
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
        Schema::dropIfExists('histories');
    }
}
