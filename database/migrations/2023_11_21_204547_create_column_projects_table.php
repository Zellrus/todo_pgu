<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('column_projects', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger("column_id");
            $table->unsignedBigInteger("project_id");
            $table->index("column_id","column_project_column_idx");
            $table->index("project_id","column_project_project_idx");
//            $table->foreign('column_id','column_project_column_fk')->on("columns")->references("id");
//            $table->foreign('project_id','column_project_project_fk')->on('projects')->references("id")->onDelete('cascade');

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('column_projects');
    }
};
