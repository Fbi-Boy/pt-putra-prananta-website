<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('property_facilities', function (Blueprint $table) {
            $table->foreignId('property_id')->constrained()->cascadeOnDelete();
            $table->foreignId('facility_id')->constrained()->cascadeOnDelete();
            $table->primary(['property_id', 'facility_id']);
        });
    }
    public function down(): void { Schema::dropIfExists('property_facilities'); }
};
