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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('task');
            $table->string('description')->default('No description')->change();
            $table->boolean('completed')->default(false);
            $table->timestamps('time');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
       // $table->string('description')->nullable(false)->change();
       $table->string('description')->default(null)->change();
    }
};
