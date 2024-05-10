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
        Schema::create("blog_category",function (Blueprint $table){
            $table->id();
            $table->string("name")->nullable(false);
            $table->string("description")->nullable(false);
            $table->string("image")->nullable(false);
            $table->string("imageWebp")->nullable(false);
            $table->string("permaLink")->nullable(false);
            $table->integer("isEnable")->nullable(false)->default(0);
            $table->integer("isPopular")->nullable(false)->default(0);
            $table->dateTime("created_at")->nullable(false);
            $table->dateTime("updated_at")->nullable(false);



        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop("blog_category");
    }
};
