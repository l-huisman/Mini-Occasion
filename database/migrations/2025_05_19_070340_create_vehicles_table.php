<?php

use App\Models\Brand;
use App\Models\Type;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('license_plate');
            $table->foreignIdFor(Brand::class);
            $table->foreignIdFor(Type::class);
            $table->dateTime('build_date');
            $table->integer('bought_at');
            $table->integer('available_at');
            $table->string('url')->nullable();
            $table->string('description')->nullable();
            $table->string('model')->nullable();
            $table->integer('mileage')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
