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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 100);
            $table->string('last_name', 100);
            $table->string('email')->unique();
            $table->string('nid')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->date('dob')->nullable();
            $table->text('image')->nullable();
            $table->text('aboutme')->nullable();
            $table->string('reg_no', 100);
            $table->rememberToken();
            $table->tinyInteger('status')->default(0)->comment('0 = pending, 1 = verified, 2 = approved, 3 = suspended');
            $table->boolean('is_blocked')->default(0);
            $table->boolean('is_visible')->default(1);
            $table->string('latlong')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
