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
        Schema::create('employees_orders', function (Blueprint $table) {
          $table->id();
          $table->foreignId('employee_id')->constrained('employees')->onDelete('cascade');
          $table->foreignId('order_type_id')->constrained('order_types')->onDelete('cascade');
          $table->integer('order_number');
          $table->dateTime('order_date');
          $table->string('title');
          $table->foreignId('old_status_id')->constrained('statuses')->onDelete('cascade');
          $table->foreignId('s_status_id')->constrained('statuses')->onDelete('cascade');

          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees_orders');
    }
};
