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
        Schema::table('posts', function (Blueprint $table) {

            //Creo una colonna user_id come intero non segnato
            // $table->unsignedBigInteger('category_id')->nullable();
 
            //Rendo la colonna user_id una foreign key su users.id
            // $table->foreign('category_id')->references('id')->on('categories');

            //Metodo alternativo equivalente alle due istruzioni precedenti
            $table->foreignId('category_id')->nullable()->constrained();
            
            //per aggiungere la colonna "category_id" subito dopo "id"
            // $table->after('id', function (Blueprint $table) {
            //     $table->foreignId('category_id')->nullable()->constrained();
            // });

            //oppure, per una colonna singola:
            //$table->foreignId('category_id')->nullable()->after("id")->constrained();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            
            //Elimino la foreign key sulla colonna, che quindi diventa un semplice intero
            $table->dropForeign('posts_category_id_foreign');

            //A questo punto posso eliminare la colonna perchè non fa riferimento a nulla
            $table->dropColumn('category_id');

        });
    }
};
