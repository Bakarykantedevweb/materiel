<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BonEntresMaterielsPivotTable extends Migration
{

        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('bon_entre_materiel', function (Blueprint $table) {
                $table->foreignId('materiel_id')->constrained();
                $table->foreignId('bon_entre_id')->constrained();
                $table->integer('quantite');
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
            Schema::dropIfExists('bon_entre_materiel');
        }
    
    
}
