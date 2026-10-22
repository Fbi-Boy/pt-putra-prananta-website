<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('inquiries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('property_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('agent_id')->nullable()->constrained()->nullOnDelete();
            $table->string('name', 100);
            $table->string('phone', 20);
            $table->string('email', 100)->nullable();
            $table->text('message')->nullable();
            $table->string('source', 30)->default('website');
            $table->string('status', 20)->default('new');
            $table->timestamps();
            $table->index('status');
        });
    }
    public function down(): void { Schema::dropIfExists('inquiries'); }
};
