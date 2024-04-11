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
        //Esta es la tabla pibote utilizada para referir a que muchos usuarios les pueden gustar muchas ideas o viceversa, que muchas ideas pueden ser gustadas por muchos usuarios. 
        //Al ser una tabla pibote o intermedia, no requiere modelo en la mayoria de los casos. Solo migracion
        Schema::create('idea_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idea_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('idea_user');
    }
};
