<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('kpr_applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('property_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('bank_id')->nullable()->constrained()->nullOnDelete();
            $table->string('name', 100);
            $table->string('phone', 20);
            $table->string('email', 100)->nullable();
            $table->bigInteger('property_price');
            $table->bigInteger('down_payment')->default(0);
            $table->integer('tenor_years');
            $table->decimal('interest_rate', 5, 2);
            $table->bigInteger('monthly_installment');
            $table->string('status', 20)->default('submitted');
            $table->text('notes')->nullable();
            $table->timestamps();
            $table->index('status');
        });
    }
    public function down(): void { Schema::dropIfExists('kpr_applications'); }
};
