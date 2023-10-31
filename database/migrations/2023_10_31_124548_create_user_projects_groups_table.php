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
        Schema::create('user_projects_groups', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_projects_id");
            $table->unsignedBigInteger("group_id");
            $table->timestamps();
            $table->index("user_projects_id","user_projects_groups_user_project_idx");
            $table->index("group_id","user_projects_groups_groups_idx");
            $table->foreign('user_projects_id','user_projects_groups_user_project_fk')->on("user_projects")->references("id");
            $table->foreign('group_id','user_projects_groups_groups_fk')->on('groups')->references("id");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_projects_groups');
    }
};
