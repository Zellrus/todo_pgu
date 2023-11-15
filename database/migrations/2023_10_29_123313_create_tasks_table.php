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
             $table->string('name');
             $table->string('color');
             $table->dateTime('deadline');
             $table->string('description')->nullable();
             $table->unsignedBigInteger('project_id');
             $table->index('project_id','tasks_project_idx');
             $table->foreign('project_id','tasks_project_fk')->on('projects')->references('id')->onDelete('cascade');
             $table->unsignedBigInteger('column_id')->default(1);
             $table->index('column_id','tasks_column_idx');
             $table->foreign('column_id','tasks_column_fk')->on('columns')->references('id');
             $table->timestamps();
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
