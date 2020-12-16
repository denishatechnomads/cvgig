<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('reference_id');
            $table->enum('resume_type',['resume','letter']);
            $table->string('payment_id')->nullable();
            $table->float('amount',8,2)->nullable();
            $table->float('discount',8,2)->nullable();
            $table->float('total_amount',8,2)->nullable();
            $table->enum('payment_status',['pending','succeed','failed','canceled'])->default('pending');
            $table->string('payment_type')->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
