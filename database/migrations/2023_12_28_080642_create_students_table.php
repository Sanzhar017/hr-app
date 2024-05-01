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
        Schema::create('employees', function (Blueprint $table) {
          $table->id();
          $table->string('first_name');
          $table->string('last_name');
          $table->string('surname');
          $table->string('email')->unique();
          $table->string('phone_number');
          $table->date('date_of_birth');
          $table->string('nationality');
          $table->string('job_title');
          $table->foreignId('status_id')->constrained('statuses')->onDelete('cascade');;
          $table->foreignId('department_id')
            ->constrained('departments')
            ->onDelete('cascade');
          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
