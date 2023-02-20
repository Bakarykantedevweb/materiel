<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterielRecuperesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materiel_recuperes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('agence_id')->constrained();
            $table->foreignId('departement_id')->constrained();
            $table->string('marque');
            $table->string('modele');
            $table->string('etat');
            $table->foreignId('type_id')->constrained();
            $table->text('date_entre');
            $table->date('description');
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
        Schema::dropIfExists('materiel_recuperes');
    }
}
