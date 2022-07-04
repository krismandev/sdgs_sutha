<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonatursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donaturs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('fund_id');
            $table->text('nama');
            $table->text('email');
            $table->text('no_hp');
            $table->integer('jumlah');
            $table->text('order_id')->nullable();
            $table->text('transaction_id')->nullable();
            $table->text('payment_type')->nullable();
            $table->text('status')->nullable();
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
        Schema::dropIfExists('donaturs');
    }
}
