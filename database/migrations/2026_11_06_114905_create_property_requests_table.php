<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('property_requests', function (Blueprint $table) {
            $table->id();
            $table->string('purpose')->nullable(); // beli / sewa
            $table->string('type')->nullable(); // ID tipe properti
            $table->string('location')->nullable();
            $table->bigInteger('budget_min')->nullable();
            $table->bigInteger('budget_max')->nullable();
            $table->integer('bedrooms')->nullable();
            $table->integer('bathrooms')->nullable();
            $table->integer('land_min')->nullable();
            $table->string('certificate')->nullable();
            $table->json('features')->nullable();
            $table->string('payment')->nullable();
            $table->text('notes')->nullable();
            $table->string('name');
            $table->string('phone');
            $table->string('email')->nullable();
            $table->string('job');
            $table->string('contact_time')->nullable();
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('property_requests');
    }
};
