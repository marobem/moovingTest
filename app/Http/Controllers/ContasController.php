<?php

namespace App\Http\Controllers;

use App\Conta;
use Illuminate\Http\Request;

class ContasController extends Controller
{
    public function store()
    {
        $conta = Conta::create($this->validateRequest());

        return redirect($conta->path());
    }

    public function update(Conta $conta)
    {
        $conta->update($this->validateRequest());

        return redirect($conta->path());
    }

    public function destroy(Conta $conta)
    {
        $conta->delete();

        return redirect('/contas');
    }

    // public function cadastrarConta()
    // {
    //     Conta::create($this->validateRequest());
    // }

    // public function alteraConta()
    // {
    //     Conta::alterar($this->validateRequest());
    // }

    protected function validateRequest()
    {
        return request()->validate(
            [
                'tipoConta' => 'required',
                'bancoFebraban' => 'required',
                'numeroDaConta' => 'required',
                'numeroAgencia' => 'required',
                'cpfTitular' => 'required'
            ]
        );
    }
}
