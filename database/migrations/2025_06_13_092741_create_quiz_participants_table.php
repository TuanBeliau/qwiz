<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('quiz_participants', function (Blueprint $table) {
            $table->id();
            $table
                ->foreignId('quiz_session_id')
                ->constrained('quiz_sessions')
                ->onDelete('cascade');
            $table
                ->foreignId('user_id')
                ->constrained('users')
                ->onDelete('cascade');
            $table
                ->enum('status', [
                    'waiting',
                    'ready',
                    'in_progress',
                    'completed',
                    'disconnected',
                ])
                ->default('waiting');
            $table->timestamp('joined_at');
            $table->timestamp('ready_at')->nullable();
            $table->timestamp('started_at')->nullable();
            $table->timestamp('last_activity_at')->nullable();
            $table->json('metadata')->nullable();
            $table->timestamps();
            $table->unique(['quiz_session_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quiz_participants');
    }
};
