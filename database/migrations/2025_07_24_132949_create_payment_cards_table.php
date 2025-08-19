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
        Schema::create('payment_cards', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->text('card_number');
            $table->string('holder_name', 255);
            $table->string('expiry');
            $table->text('cvv', 3);
            $table->string('card_type', 20);
            $table->decimal('balance', 12, 2)->default(0);
            $table->timestamps();

            $table->index('user_id');
            $table->index('card_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_cards');
    }
};
