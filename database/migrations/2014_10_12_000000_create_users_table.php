<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken(); //Es una ayuda para el secuestro de cookies (Remenber me), lo que hace es que cuando tu inicias y cierras sesion con un perfil guardado, cambia las cookies (se actualizan todo el tiempo por eso nunca son las misma y son mas seguras ante el secuestro de informacion de cookies)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users'); //busca tabla y elimina (Hace todo lo reverso al up)
    }
};
