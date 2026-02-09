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

    $table->string('name');                 // Nombre del producto
    $table->string('unit')->default('UND'); // UND, KG, GR, LT, etc.
    $table->decimal('price', 10, 2)->default(0); // Precio 
    $table->integer('stock')->default(0);   // Stock actual
    $table->integer('stock_min')->default(0); // Umbral de bajo stock
    $table->boolean('active')->default(true);

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
