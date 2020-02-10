<?php

namespace App;

use Money\Money;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Conta extends Model
{
    // private $contaId;
    // /** @var TipoConta */
    // private $tipoConta;
    // /** @var Money */
    // private $saldo;
    // /** @var Carbon */
    // private $dataUltimoSaque;
    // /** @var Money */
    // private $totalSacadoNoDia;
    // private $bancoFebraban;
    // private $numeroDaConta;
    // private $numeroAgencia;
    // private $cpfTitular;

    protected $guarded = [];

    public function path()
    {
        return '/contas/' . $this->contaId;
    }
}
