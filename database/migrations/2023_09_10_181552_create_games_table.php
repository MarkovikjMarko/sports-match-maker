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
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->string("location");
            $table->date("date");
            $table->string("time");
            $table->text("description");
            $table->boolean("isTeamGame");
            $table->boolean("isPending");

            $table->unsignedBigInteger('player1')->nullable();
            $table->unsignedBigInteger('player2')->nullable();
            $table->unsignedBigInteger('team1')->nullable();
            $table->unsignedBigInteger('team2')->nullable();
            $table->unsignedBigInteger('sport_id');

            $table->foreign('player1')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('player2')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('team1')->references('id')->on('teams')->onDelete('cascade');
            $table->foreign('team2')->references('id')->on('teams')->onDelete('cascade');
            $table->foreign('sport_id')->references('id')->on('sports');
        
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
