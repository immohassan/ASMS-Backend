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
        Schema::create('detention', function (Blueprint $table) {
            $table->id();
            $table->string('student_id');
            $table->string('reason');
            $table->string('duration');
            $table->string('date');
            $table->string('parent_notified');
            $table->string('notes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detention');
    }
};
