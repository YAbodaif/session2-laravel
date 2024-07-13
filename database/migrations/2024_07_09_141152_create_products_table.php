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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title',100);
            $table->text('description');
            $table->string('img',100);
            $table->double('price')->nullable();
            $table->string('category', 100);
            $table->integer('quantity')->nullable()->default(0);
            $table->integer('temp_qty')->nullable()->default(0);
            $table->boolean('approved')->nullable()->default(false);
            $table->integer('seller_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
