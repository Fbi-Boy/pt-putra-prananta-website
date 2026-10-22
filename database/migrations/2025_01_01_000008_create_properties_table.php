<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('code', 20)->unique();
            $table->string('title');
            $table->string('slug')->unique();
            $table->longText('description')->nullable();
            $table->enum('listing_type', ['sale', 'rent'])->default('sale');

            $table->foreignId('property_type_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('area_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('agent_id')->nullable()->constrained()->nullOnDelete();

            // Lokasi & Fake Coordinate
            $table->string('address')->nullable();
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->boolean('show_exact_location')->default(false);
            $table->integer('map_radius_meter')->default(500);

            // Harga
            $table->bigInteger('price')->default(0);
            $table->enum('price_unit', ['day', 'month', 'year'])->nullable();
            $table->timestamp('price_dropped_at')->nullable();

            // Spesifikasi
            $table->integer('land_area')->nullable();
            $table->integer('building_area')->nullable();
            $table->integer('bedrooms')->default(0);
            $table->integer('bathrooms')->default(0);
            $table->integer('carports')->default(0);
            $table->integer('floors')->default(1);
            $table->integer('year_built')->nullable();
            $table->string('certificate', 50)->nullable();

            // Marketing & Status
            $table->enum('status', ['draft', 'published', 'sold', 'rented', 'archived'])->default('draft');
            $table->boolean('is_recommended')->default(false);
            $table->boolean('is_kpr_eligible')->default(false);
            $table->string('video_provider', 20)->nullable();
            $table->string('video_id', 50)->nullable();
            $table->integer('view_count')->default(0);
            $table->timestamp('published_at')->nullable();

            // Submission & Verifikasi
            $table->foreignId('submitted_by')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('verified_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamp('verified_at')->nullable();

            // Audit
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
            $table->softDeletes();

            // Index performa
            $table->index(['status', 'published_at']);
            $table->index(['status', 'area_id', 'property_type_id']);
            $table->index(['status', 'listing_type']);
            $table->index(['status', 'is_recommended']);
            $table->index(['status', 'is_kpr_eligible']);
            $table->index('price');
        });
    }
    public function down(): void { Schema::dropIfExists('properties'); }
};
