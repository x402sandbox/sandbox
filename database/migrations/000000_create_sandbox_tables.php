<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sandbox_requests', function (Blueprint $table) {
            $table->id();
            $table->string('payment_hash', 64)->index();
            $table->string('payer', 42)->nullable()->index();
            $table->string('transaction', 66)->nullable()->index();
            $table->string('type', 16);
            $table->boolean('ok')->index();
            $table->jsonb('payload');
            $table->dateTime('received_at')->index();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sandbox');
    }
};
