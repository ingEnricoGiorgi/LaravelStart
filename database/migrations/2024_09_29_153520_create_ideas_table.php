<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * int id
     * 255 varchar
     * unsigned int default 0
     * created at - updated at
     */
    public function up(): void
    {
        Schema::create('ideas', function (Blueprint $table) {
            $table->id();
            //constrained= only for user that exist
            //cascade on delete se viene eliminato da user_id a cne su ideas verra eliminata
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('content');
            $table->unsignedInteger('likes')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ideas');
    }
};
