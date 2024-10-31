<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('follower_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            /*Chiave esterna: ->constrained() aggiunge una chiave esterna per la colonna user_id,
             collegandola alla colonna id della tabella users (o alla tabella con un nome basato
            sulla colonna, se non specificato).
            */
            $table->foreignId('follower_id')->constrained('users')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
            public
            function down(): void
            {
                Schema::dropIfExists('follower_user');
            }
        };
