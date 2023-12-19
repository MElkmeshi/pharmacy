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
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('url');
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->string('required_role')->nullable(); // Add this column
            $table->timestamps();
        
            $table->foreign('parent_id')->references('id')->on('menus');  //hierarchical structure for menu items
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};


