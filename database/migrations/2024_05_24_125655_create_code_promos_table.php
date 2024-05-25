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
        Schema::create('code_promos', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->integer('percentage');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->date('expired_at');
            $table->boolean('is_used')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('code_promos');
    }
};
