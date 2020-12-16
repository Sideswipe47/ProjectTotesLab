<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('delivery_service_id')->nullable();
            $table->unsignedBigInteger('delivery_option_id')->nullable();
            $table->unsignedBigInteger('promotion_id')->nullable();
            $table->char('card_number', 16);
            $table->string('address', 500);
            $table->string('note', 1000)->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('delivery_service_id')->references('id')->on('delivery_services')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('delivery_option_id')->references('id')->on('delivery_options')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('promotion_id')->references('id')->on('promotions')->onDelete('set null')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
