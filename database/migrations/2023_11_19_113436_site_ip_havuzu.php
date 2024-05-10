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
        Schema::create("blog_siteIpHavuzu",function(Blueprint $table){
            $table->id();
            $table->string("ip")->nullable(false);
            $table->string("sonZiyaret")->nullable(false);
            $table->string("toplamZiyaret")->nullable(false);
            $table->dateTime("created_at")->nullable(false);
            $table->dateTime("updated_at")->nullable(false);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("siteIpHavuzu");
    }
};
