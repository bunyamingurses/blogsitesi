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
        Schema::create("blog_blog",function (Blueprint $table){
            $table->id();
            $table->string("name")->nullable(false);
            $table->string("image")->nullable(false);
            $table->string("imageWebp")->nullable(false);
            $table->unsignedBigInteger("categoryId")->nullable(false);
            $table->string("permalink")->nullable(false);
            $table->string("tags")->nullable(false);
            $table->integer("isEnable")->nullable(false)->default(0);
            $table->integer("isPopular")->nullable(false)->default(0);
            $table->integer("isCarousel")->nullable(false)->default(0);
            $table->integer("readCount")->default(0)->nullable(false);
            $table->dateTime("created_at")->nullable(false);
            $table->dateTime("updated_at")->nullable(false);





            $table->foreign("categoryId")->references("id")->on("blog_category");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('blog_blog');
    }
};
