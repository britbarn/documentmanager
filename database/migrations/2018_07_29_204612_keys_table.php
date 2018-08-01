<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KeysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('key_values', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('doc_id');
            $table->string('key');
            $table->string('value');
            $table->timestamps();
            
            $table->foreign('doc_id')->references('id')->on('document');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('key_values');
    }
}
