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
        Schema::create('department_employee', function (Blueprint $table) {
          $table->id();
          $table->unsignedBigInteger('department_id');
          $table->unsignedBigInteger('employee_id');
          $table->timestamps();

          $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
          $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('department_employee');
    }
};
