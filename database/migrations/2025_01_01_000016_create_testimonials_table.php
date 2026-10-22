<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('role', 100)->nullable();
            $table->string('photo')->nullable();
            $table->decimal('rating', 3, 1)->default(5.0);
            $table->text('message');
            $table->boolean('is_active')->default(true);
            $table->integer('order')->default(0);
            $table->timestamps();
            $table->index('is_active');
        });
    }
    public function down(): void { Schema::dropIfExists('testimonials'); }
};
