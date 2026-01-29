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
            $table->string('post_category');
            $table->string('post_title');
            $table->string('post_img')->nullable();
            $table->text('post_content');
            $table->string('author')->nullable();
            $table->enum('post_status', ['published', 'draft', 'pending'])->default('draft');
            $table->string('slug');
            $table->string('clicked')->nullable();
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
