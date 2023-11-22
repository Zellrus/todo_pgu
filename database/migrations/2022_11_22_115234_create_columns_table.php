<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('columns', function (Blueprint $table) {
            $table->id();
            $table->integer('sorting');
            $table->string('title');
            $table->string('color')->default('#000');
//            $table->string('description')->nullable();
            $table->unsignedBigInteger('project_id');
            $table->index('project_id','columns_project_idx');
            $table->foreign('project_id','columns_project_fk')->on('projects')->references('id')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('columns');
    }
};
