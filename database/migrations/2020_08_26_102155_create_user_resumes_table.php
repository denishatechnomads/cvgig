<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserResumesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_resumes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('template_id');
            $table->string('title');
            $table->longText('contact_info')->nullable();
            $table->longText('experience_info')->nullable();
            $table->longText('education')->nullable();
            $table->longText('skills')->nullable();
            $table->longText('summary')->nullable();
            $table->longText('extra_section')->nullable();
            $table->longText('style_section')->nullable();
            $table->integer('complete_step')->default(0);
            $table->string('upload_file')->nullable();
            $table->longText('sortable')->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('template_id')->references('id')->on('templates')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_resumes');
    }
}
