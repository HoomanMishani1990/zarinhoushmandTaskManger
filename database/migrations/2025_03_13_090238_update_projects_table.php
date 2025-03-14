<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            
            $table->string('client_name')->nullable();
            $table->decimal('total_budget', 10, 2)->nullable();
            $table->decimal('spent_budget', 10, 2)->nullable();
            $table->date('start_date');
            $table->date('deadline');
            $table->integer('total_hours')->nullable();
            $table->integer('spent_hours')->nullable();
            $table->integer('total_tasks')->nullable();
            $table->integer('completed_tasks')->nullable();
            $table->integer('progress_percentage')->default(0);
            $table->integer('members_count')->default(0);
            $table->integer('comments_count')->default(0);
            $table->string('status')->default('in_progress');
            $table->string('image_path')->nullable();
            
        });
    }

    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            // Drop the new columns
            $table->dropColumn([
                'client_name', 'total_budget', 'spent_budget',
                'start_date', 'deadline', 'total_hours',
                'spent_hours', 'total_tasks', 'completed_tasks',
                'progress_percentage', 'members_count', 'comments_count',
                'status', 'image_path'
            ]);
        });
    }
}; 