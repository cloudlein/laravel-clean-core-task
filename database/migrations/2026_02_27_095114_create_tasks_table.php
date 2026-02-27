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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->string('title', 150)->nullable(false);
            $table->text('description')->nullable();
            $table->enum('status', ['draft', 'active', 'done'])->default('draft')->nullable(false);
            $table->dateTime('deadline')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->index('user_id', 'idx_tasks_user');
            $table->index('status', 'idx_tasks_status');
            $table->index('deadline', 'idx_tasks_deadline');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
