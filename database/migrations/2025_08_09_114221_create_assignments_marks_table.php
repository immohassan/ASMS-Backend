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
        Schema::create('assignments_marks', function (Blueprint $table) {
            $table->id();
            $table->string(column: 'assignment_id');
            $table->string(column: 'class_id');
            $table->string(column: 'student_id');
            $table->string(column: 'subject_id');
            $table->string(column: 'marks_obtained');
            $table->string(column: 'grade');
            $table->string(column: 'remarks');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assignments_marks');
    }
};
