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
        Schema::create("blog_comment",function(Blueprint $table){
            $table->id();
            $table->string("name")->nullable(false);
            $table->string("email")->nullable(false);
            $table->string("comment")->nullable(false);
            $table->integer("enable")->nullable(false)->default(0);
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
        Schema::dropIfExists("blog_comment");
    }
};
