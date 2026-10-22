<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('facilities', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('icon', 50)->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->index('is_active');
        });
    }
    public function down(): void { Schema::dropIfExists('facilities'); }
};
