<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seller_lazadas', function (Blueprint $table) {
            $table->bigInteger('seller_id')->primary();
            $table->integer('user_id');
            $table->string('country');
            $table->string('access_token');            
            $table->date('token_expires_at');
            $table->string('refresh_token');            
            $table->date('refresh_expires_at');
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
        Schema::dropIfExists('seller_lazadas');
    }
};
