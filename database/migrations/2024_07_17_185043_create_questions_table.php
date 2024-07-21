<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('content');
            $table->integer('viewcount');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('user_id');
            $table->boolean('issolved')->default(0);
            $table->float('rate')->nullable();
            $table->integer('likecount');
            $table->integer('dislikecount');
            $table->string('slug');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
