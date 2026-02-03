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
        Schema::create('tagihan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pelanggan_id')->constrained('pelanggan')->onDelete('cascade');
            $table->string('periode', 7); // Format: YYYY-MM
            $table->date('jatuh_tempo');
            $table->bigInteger('nominal');
            $table->string('status', 20)->default('unpaid'); // unpaid, paid
            $table->timestamp('reminder_hmin1_sent_at')->nullable();
            $table->timestamp('reminder_h_sent_at')->nullable();
            $table->timestamp('reminder_hplus1_sent_at')->nullable();
            $table->timestamps();
            
            // Unique constraint: satu pelanggan hanya punya satu tagihan per periode
            $table->unique(['pelanggan_id', 'periode']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tagihan');
    }
};
