<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contas', function (Blueprint $table) {
            $table->bigIncrements('contaId');
            $table->integer('tipoConta');
            $table->money_format('saldo');
            $table->date('dataUltimoSaque');
            $table->money_format('totalSacadoNoDia');
            $table->string('bancoFebraban');
            $table->string('numeroDaConta');
            $table->string('numeroAgencia');
            $table->string('cpfTitular');
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
        Schema::dropIfExists('contas');
    }
}
