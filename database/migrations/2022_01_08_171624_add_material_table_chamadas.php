<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMaterialTableChamadas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('chamadas', function (Blueprint $table) {
            $table->boolean('material')
                ->nullable() // Preenchimento não obrigatório
                ->after('data');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('chamadas', function (Blueprint $table) {
            $table->dropColumn('material');
        });
    }
}
