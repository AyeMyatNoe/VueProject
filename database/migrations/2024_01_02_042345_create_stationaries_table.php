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
        Schema::create('stationaries', function (Blueprint $table) {
            $table->id();
            $table->string('item',256);
            $table->string('category',256);
            $table->string('description',1024);
            $table->integer('price');
            $table->string('owner',256);
            $table->string('cond', 256)->nullable();
            $table->string('type', 256)->nullable();
            $table->string('address', 1024)->nullable();
            $table->integer('phone')->nullable();
            $table->string('photo',128)->nullable(); 
            $table->integer('del_flg')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stationaries');
    }
};
