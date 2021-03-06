<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parts', function (Blueprint $table) {
            $table->bigIncrements('id'); //パーツID
            $table->string('name'); //パーツ名
            $table->integer('price'); //価格
            $table->integer('value'); //内容量
            $table->string('unit'); //単位
            $table->double('bit'); //単価
            $table->string('shop')->nullable()->default(null);
            $table->text('other')->nullable()->default(null);
            $table->integer('genru_id')->nullable()->default(null);
            $table->integer('user_id');
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
        Schema::dropIfExists('parts');
    }
}
