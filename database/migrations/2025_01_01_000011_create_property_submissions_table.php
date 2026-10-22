<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('property_submissions', function (Blueprint $table) {
            $table->id();
            $table->string('submission_code', 30)->unique();
            $table->string('access_token', 32)->unique();

            // Siapa yang submit
            $table->foreignId('submitted_by')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('agent_id')->nullable()->constrained()->nullOnDelete();
            $table->string('submitter_name', 100);
            $table->string('submitter_phone', 20);
            $table->string('submitter_email', 100)->nullable();

            // Data properti (subset)
            $table->string('title');
            $table->text('description')->nullable();
            $table->enum('listing_type', ['sale', 'rent'])->default('sale');
            $table->foreignId('property_type_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('area_id')->nullable()->constrained()->nullOnDelete();
            $table->string('address')->nullable();
            $table->bigInteger('price')->nullable();
            $table->integer('land_area')->nullable();
            $table->integer('building_area')->nullable();
            $table->integer('bedrooms')->nullable();
            $table->integer('bathrooms')->nullable();
            $table->json('photo_paths')->nullable();

            // Status & verifikasi
            $table->string('status', 20)->default('pending');
            $table->json('auto_check_result')->nullable();
            $table->foreignId('verified_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamp('verified_at')->nullable();
            $table->text('rejection_reason')->nullable();
            $table->text('admin_notes')->nullable();
            $table->foreignId('converted_property_id')->nullable()->constrained('properties')->nullOnDelete();

            $table->timestamps();
            $table->index('status');
            $table->index(['status', 'created_at']);
        });
    }
    public function down(): void { Schema::dropIfExists('property_submissions'); }
};
