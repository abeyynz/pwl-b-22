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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->char('npm', 10)->unique();
            $table->string('name', 60);
            $table->year('year_entry');
            $table->char('nidn', 10);
            $table->foreignId('department_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');

            // set FK constraints
            $table->foreign('nidn')
                ->references('nidn')
                ->on('lecturers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
