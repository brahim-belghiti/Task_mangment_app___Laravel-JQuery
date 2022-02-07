<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actions', function (Blueprint $table) {
            $table->id();
            $table->string("description");
            $table->string("definition of done");
            $table->boolean('is_done')->default(false);
            $table->timestamp("deadline");
            $table->foreignId("user_id")->constrained("users")->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId("project_id")->constrained("projects")->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('actions');
    }
}
