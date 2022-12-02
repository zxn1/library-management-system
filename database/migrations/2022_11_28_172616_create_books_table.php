<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

     /*
        'acquisition',
        'title',
        'publisher',
        'year_acquisition',
        'year_publish',
        'lang_id',
        'categ_id',
        'author_id'
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('acquisition');
            $table->string('title');
            $table->bigInteger('rack_number');
            $table->string('cover_image')->nullable();
            $table->string('publisher');
            $table->date('year_acquisition');
            $table->date('year_publish');
            $table->bigInteger('lang_id')->unsigned();
            $table->bigInteger('categ_id')->unsigned();
            $table->bigInteger('author_id')->unsigned();
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
        Schema::dropIfExists('books');
    }
}
