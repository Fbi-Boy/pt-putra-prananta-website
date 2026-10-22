<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('banks', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('code', 20)->unique();
            $table->string('logo')->nullable();
            $table->decimal('interest_rate', 5, 2)->default(7.50);
            $table->integer('min_tenor')->default(5);
            $table->integer('max_tenor')->default(20);
            $table->decimal('min_dp_percent', 5, 2)->default(10.00);
            $table->boolean('is_active')->default(true);
            $table->integer('order')->default(0);
            $table->timestamps();
            $table->index('is_active');
        });
    }
    public function down(): void { Schema::dropIfExists('banks'); }
};
