<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dealership_user', function (Blueprint $table) {
            $table->foreignId('dealership_id')->constrained('dealerships');
            $table->foreignId('user_id')->constrained('users');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dealership_user');
    }
};
