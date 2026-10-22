<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('developers', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('logo');
            $table->string('website')->nullable();
            $table->boolean('is_active')->default(true);
            $table->integer('order')->default(0);
            $table->timestamps();
            $table->index('is_active');
        });
    }
    public function down(): void { Schema::dropIfExists('developers'); }
};
