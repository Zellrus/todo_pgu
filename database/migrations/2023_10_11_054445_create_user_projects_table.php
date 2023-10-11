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
        Schema::create('user_projects', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger("user_id");
            $table->unsignedBigInteger("project_id");
            $table->timestamps();

            $table->index("user_id","user_project_user_idx");
            $table->index("project_id","user_project_project_idx");
            $table->foreign('user_id','user_tag_user_fk')->on("users")->references("id");
            $table->foreign('project_id','user_project_project_fk')->on('projects')->references("id");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_pojects');
    }
};
