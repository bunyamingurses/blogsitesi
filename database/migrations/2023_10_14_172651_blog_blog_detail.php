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
        Schema::create("blog_blogDetail",function (Blueprint $table){
            $table->id();
            $table->text("text")->nullable(false);
            $table->string("image")->nullable(true);
            $table->string("imageWebp")->nullable(true);
            $table->unsignedBigInteger("blog_id");
            $table->dateTime("created_at")->nullable(false);
            $table->dateTime("updated_at")->nullable(false);



            $table->foreign("blog_id")->references("id")->on("blog_blog");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop("blog_blogDetail");
    }
};
