<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('areas', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('slug', 100)->unique();
            $table->string('type', 20)->default('district');
            $table->foreignId('parent_id')->nullable()->constrained('areas')->nullOnDelete();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->index('type');
        });
    }
    public function down(): void { Schema::dropIfExists('areas'); }
};
