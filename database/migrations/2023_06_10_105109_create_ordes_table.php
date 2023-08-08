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
        Schema::create('ordes', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id');
            $table->string('user_email');
            $table->string('address');
            $table->string('status');
            $table->string('peymaen_mathod');
            $table->string('payment_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ordes');
    }
};
