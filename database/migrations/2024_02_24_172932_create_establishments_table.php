<?php

use Domain\Establishment\Enum\EstablishmentTypes;
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
        Schema::create('establishments', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('description')->nullable();
            $table->json('configs')->nullable();
            $table->foreignUuid('establishment_id')
                ->nullable()
                ->constrained()
                ->references('id')
                ->on('establishments')
                ->cascadeOnDelete();
            $table->foreignUuid('organization_id')
                ->constrained()
                ->references('id')
                ->on('organizations')
                ->cascadeOnDelete();
            $table->enum('type', EstablishmentTypes::values());
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('establishments');
    }
};
