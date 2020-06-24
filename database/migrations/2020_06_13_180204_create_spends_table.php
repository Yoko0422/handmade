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
            $table->date('date');
            $table->string('which');
            $table->integer('amount');
            $table->string('purpose')->nullable()->default(null);
            $table->string('shop')->nullable()->default(null);
            $table->string('other')->nullable()->default(null);
            $table->integer('part_id');
            $table->integer('genru_id');
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
