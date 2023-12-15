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
        Schema::create('payment_method_option_value', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger ('paymentMethodoptionId');
            $table->string('value');
            $table->unsignedBigInteger ('userId');
            $table->foreign('paymentMethodoptionId')->references('id')->on('payment_method_options')->onDelete('cascade');
            $table->foreign('userId')->references('id')->on('users')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_method_option_value');
    }
};
