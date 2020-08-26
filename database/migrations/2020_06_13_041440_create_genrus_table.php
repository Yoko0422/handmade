<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGenrusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('genrus', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('name')->nullable()->default(null);;
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
        Schema::dropIfExists('genrus');
    }
}
