<?php

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
        Schema::create('sales_groups_users', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('sales_group_id')
                ->constrained()
                ->references('id')
                ->on('sales_groups')
                ->cascadeOnDelete();
            $table->foreignUuid('user_id')
                ->constrained()
                ->references('id')
                ->on('users')
                ->cascadeOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales_groups_users');
    }
};
