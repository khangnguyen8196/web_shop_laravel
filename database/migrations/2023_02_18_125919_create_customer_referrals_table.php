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
        Schema::create('customer_referral', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('parent_customer_id')->nullable();
            $table->integer('child_customer_id')->nullable();
            $table->string('referral_code')->nullable();
            $table->integer('current_parent_referral_level')->nullable();
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
        Schema::dropIfExists('customer_referral');
    }
};
