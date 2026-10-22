<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('advertisements', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('image');
            $table->string('link')->nullable();
            $table->string('position', 30)->default('home');
            $table->boolean('is_active')->default(true);
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->integer('order')->default(0);
            $table->timestamps();
            $table->index(['is_active', 'position']);
            $table->index('start_date');
            $table->index('end_date');
        });
    }
    public function down(): void { Schema::dropIfExists('advertisements'); }
};
