<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserLettersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_letters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('template_id');
            $table->string('title');
            $table->string('letter_type');
            $table->string('letter_subtype');
            $table->longText('contact_info')->nullable();
            $table->longText('recipient_info')->nullable();
            $table->text('subject')->nullable();
            $table->longText('greeting')->nullable();
            $table->text('opener')->nullable();
            $table->longText('body')->nullable();
            $table->longText('call_to_action')->nullable();
            $table->longText('closer')->nullable();
            $table->longText('style_section')->nullable();
            $table->integer('complete_step')->default(0);
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
        Schema::dropIfExists('user_letters');
    }
}
