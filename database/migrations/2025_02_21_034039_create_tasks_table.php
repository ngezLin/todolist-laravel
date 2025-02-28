<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('priority');
            $table->foreignId('customer_id')->constrained('customers')->onDelete('cascade');
            $table->date('due_date');
            $table->text('description');
            $table->string('materials')->nullable(); // URL or PDF
            $table->integer('completion_percentage')->default(0);
            $table->enum('status', ['pending', 'completed'])->default('pending');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tasks');
    }
};
