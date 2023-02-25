<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFonctionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fonctions', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->timestamps();
        });

        DB::table('fonctions')->insert([
            [
                'nom' =>  'Chef Agence',

            ],
            [
                'nom' =>  'Caissier',

            ],
            [
                'nom' =>  'Charge d\'Affaire',

            ],
            [
                'nom' =>  'Charge Clientele',
            ],
            [
                'nom' =>  'Contrôleur',
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fonctions');
    }
}
