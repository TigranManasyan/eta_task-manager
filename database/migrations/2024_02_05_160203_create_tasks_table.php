<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('text');
            $table->json('images')->nullable();
            $table->foreignId('user_id')->constrained(); // Внешний ключ для связи с таблицей users
            $table->enum('status', ['pending', 'completed'])->default('pending');
            $table->enum('importance', ['low', 'medium', 'high'])->default('medium');
            $table->unsignedBigInteger('created_by'); // Внешний ключ для связи с таблицей users
            $table->timestamps();

            $table->foreign('created_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
