<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTipoToUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
//            por default sera id 1 que es un cliente
            $table->foreignId('tipo_usuario_id')->after('id')->default(1)->constrained('tipo_usuario');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('users_tipo_usuario_id_foreign');
            $table->dropColumn('tipo_usuario_id');
        });
    }
}
