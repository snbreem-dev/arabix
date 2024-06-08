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
        Schema::create('communications', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('communication_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('communication_id')->constrained();

            $table->string('locale')->index();
            $table->string('name');

            $table->unique(['name', 'locale']);
            $table->unique(['communication_id', 'locale']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('communication_translations');
        Schema::dropIfExists('communications');
    }
};
