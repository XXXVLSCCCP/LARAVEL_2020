<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category', function (Blueprint $table) {


//            'slug'=>'sport',
//            'title'=>'Новость о спотре',
//            'text'=>'Лучшая новость о спотре',
            $table->bigIncrements('id');
            $table->string('slug')->comment('slug');
            $table->string('title');
            $table->text('text');
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
        Schema::dropIfExists('category');
    }
}
