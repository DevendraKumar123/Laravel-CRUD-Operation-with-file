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
        Schema::create('emp', function (Blueprint $table) {
            $table->id();
            $table->string('empname');
            $table->date('dob');
            $table->string('email');
            $table->string('mobile');
            $table->string('pancard');
            $table->string('image');
            $table->integer('status')->default(1); //0:Inactve, 1:Active
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emp');
    }
};
