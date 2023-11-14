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
        Schema::create('columns', function (Blueprint $table) {
             $table->id();
             $table->string('name');
             $table->string('color');
             $table->boolean('can_create_task');
             $table->integer('sort')->nullable();
             $table->unsignedBigInteger('project_id');
             $table->index('project_id','columns_project_idx');
             $table->foreign('project_id','columns_project_fk')->on('projects')->references('id')->onDelete('cascade');
             $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('columns');
    }
};
