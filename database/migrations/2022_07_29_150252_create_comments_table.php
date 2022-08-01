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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            // $table->unsignedInteger('post');
            // $table->unsignedInteger('user');
            $table->text('content');

            // $table->foreign('post')->references('id')->on('posts')->onDelete('cascade');
            // $table->foreign('user')->references('id')->on('users')->onDelete('cascade');

            // comentar p/ poloformismo
            // $table->foreignId('post_id')->constrained('posts')->onDelete('cascade');
            // $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            // poliformismo
            $table->morphs('item');
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
        Schema::dropIfExists('comments');
    }
};
