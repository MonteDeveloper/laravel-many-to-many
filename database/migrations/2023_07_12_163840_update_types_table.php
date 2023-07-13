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
        Schema::table('projects', function (Blueprint $table) {
            
            //$table->foreign('type_id')->references('id')->on('types');

            $table->foreignId('type_id')->nullable()->constrained();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            
            //Elimino la foreign key sulla colonna, che quindi diventa un semplice intero
            $table->dropForeign('projects_type_id_foreign');

            //A questo punto posso eliminare la colonna perchè non fa riferimento a nulla
            $table->dropColumn('type_id');

        });
    }
};
