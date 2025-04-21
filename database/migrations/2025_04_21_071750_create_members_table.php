<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id('member_id');
            $table->string('name');
            $table->string('email');
            $table->enum('role', ['Student', 'Instructor']);
            $table->string('image')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->foreignId('class_id')->constrained('classes', 'class_id');
            $table->timestamp('allocation_deleted_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
