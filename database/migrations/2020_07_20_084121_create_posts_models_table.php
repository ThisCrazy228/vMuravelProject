<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsModelsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('posts_models', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id')->nullable()->default(NULL);
            $table->string('name')->nullable()->default(NULL);
            $table->string('content')->nullable()->default(NULL);
            $table->string('file')->nullable()->default(NULL);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('posts_models');
    }
}
