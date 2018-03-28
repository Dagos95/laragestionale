<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->index();  // Con index è possibile registrare lo stesso utente (con la stessa email) senza far apparire l'errore // Lo si usa quando sì utilizza softDeletes
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();  // Permette segna come una riga come "cancellata", ma rimane nel database
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
