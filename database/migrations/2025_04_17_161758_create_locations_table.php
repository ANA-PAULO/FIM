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
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->decimal('latitude', 10, 7);  // 10 dígitos, 7 após o ponto decimal
            $table->decimal('longitude', 10, 7); // 10 dígitos, 7 após o ponto decimal
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Relação com o usuário
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locations');
    }
};
