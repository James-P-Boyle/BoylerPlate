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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            // adding a 1 to many (1 user has many posts)
            // unsignedBigInteger is needed when working with foreign keys
            $table->unsignedBigInteger('user_id');
            $table->string('title')->unique();
            $table->text('excerpt')->nullable();
            $table->text('body');
            $table->integer('min_to_read')->default(1);
            $table->string('image_path');
            $table->boolean('is_published');
            // user id references to id on the users table
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
