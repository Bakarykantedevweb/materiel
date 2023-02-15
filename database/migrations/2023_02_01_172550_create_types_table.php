<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('types', function (Blueprint $table) {
            $table->id();
            $table->string('libelle');
            $table->timestamps();
        });
        DB::table('types')->insert([
            [
                'libelle' =>  'Ordinateur Portable',

            ],
            [
                'libelle' =>  'Ordinateur Bureautique',

            ],
            [
                'libelle' =>  'Imprimante',

            ],
            [
                'libelle' =>  'Scanner',
            ],
        ]
    );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('types');
    }
}
