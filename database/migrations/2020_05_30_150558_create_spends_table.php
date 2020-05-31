<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpendsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spends', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('parts_name'); //パーツ名
            $table->string('which'); //使用か購入か
            $table->date('date'); //購入/使用日
            $table->integer('value'); //使用/購入数
            $table->string('purpose'); //用途
            $table->string('other'); //備考
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
        Schema::dropIfExists('spends');
    }
}
