<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('properties', function (Blueprint $table) {
            $table->foreignId('submission_id')
                ->nullable()
                ->after('submitted_by')
                ->constrained('property_submissions')
                ->nullOnDelete();
        });
    }
    public function down(): void {
        Schema::table('properties', function (Blueprint $table) {
            $table->dropForeign(['submission_id']);
            $table->dropColumn('submission_id');
        });
    }
};
