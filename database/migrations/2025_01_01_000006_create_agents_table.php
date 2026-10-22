<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('agents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->unique()->constrained()->cascadeOnDelete();
            $table->string('name', 100);
            $table->string('slug', 150)->unique();
            $table->string('photo')->nullable();
            $table->string('phone', 20);
            $table->string('whatsapp', 20)->nullable();
            $table->string('email', 100)->nullable();
            $table->text('bio')->nullable();
            $table->string('status', 20)->default('pending');
            $table->timestamp('verified_at')->nullable();
            $table->foreignId('verified_by')->nullable()->constrained('users')->nullOnDelete();
            $table->text('rejection_reason')->nullable();
            $table->integer('order')->default(0);
            $table->timestamps();
            $table->index('status');
        });
    }
    public function down(): void { Schema::dropIfExists('agents'); }
};
