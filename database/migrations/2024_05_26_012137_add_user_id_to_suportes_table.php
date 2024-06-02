<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToSuportesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('suportes', function (Blueprint $table) {
            // Verifique se a coluna 'user_id' já existe antes de adicioná-la
            if (!Schema::hasColumn('suportes', 'user_id')) {
                $table->unsignedBigInteger('user_id')->after('id');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('suportes', function (Blueprint $table) {
            $table->dropColumn('user_id');
        });
    }
}
