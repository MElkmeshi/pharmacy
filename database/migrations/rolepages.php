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
        Schema::create('role_pages', function (Blueprint $table) {
            $table->id('RolePageID');
            $table->unsignedBigInteger('RoleID');
            $table->unsignedBigInteger('PageID');
            $table->foreign('RoleID')->references('RoleID')->on('roles');
            $table->foreign('PageID')->references('PageID')->on('pages');
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('role_pages');
    }
};
