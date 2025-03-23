<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title', 191)->unique();
            $table->unsignedBigInteger('campaign_id');
            $table->string('slug', 191)->unique();
            $table->text('short_description')->nullable();
            $table->text('description');
            $table->integer('project_end_method')->nullable();
            $table->string('video_link')->nullable();
            $table->string('location')->nullable();
            $table->date('start_date')->nullable();
            $table->date('deadline')->nullable();
            $table->integer('status')->nullable();
           
            $table->timestamps();

            $table->foreign('campaign_id')->references('id')->on('campaigns')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
};
