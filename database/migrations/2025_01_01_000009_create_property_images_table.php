<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('property_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('property_id')->constrained()->cascadeOnDelete();
            $table->string('path_thumb');
            $table->string('path_medium');
            $table->string('path_large');
            $table->string('alt_text')->nullable();
            $table->boolean('is_primary')->default(false);
            $table->integer('order')->default(0);
            $table->integer('file_size_medium')->nullable();
            $table->integer('width')->nullable();
            $table->integer('height')->nullable();
            $table->timestamps();
            $table->index(['property_id', 'is_primary']);
        });
    }
    public function down(): void { Schema::dropIfExists('property_images'); }
};
