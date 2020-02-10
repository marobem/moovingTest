<?php

namespace Tests\Feature;

use App\Conta;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContaTest extends TestCase
{
    use RefreshDatabase;
    
    /** @test */
    public function cadastrarContaTest()
    {
        $response = $this->post('/contas', $this->data());

        $conta = Conta::first();

        $this->assertCount(1, Conta::all());
        $response->assertRedirect($conta->path());



        // $this->withExceptionHandling();

        // $response = $this->post('/contas', [
        //     'tipoConta' => 1
        // ]);

        // $response->assertOk();

        // $this->assertCount(1, Conta::all());
    }

    /** @test */
    public function validaCampoTipoContaTest()
    {
        $response = $this->post('/contas', [
            'tipoConta' => null,
            'bancoFebraban' => '001',
            'numeroDaConta' => '123456',
            'numeroAgencia' => '12345',
            'cpfTitular' => '09388556038'
        ]);

        $response->assertSessionHasErrors('tipoConta');
    }

    /** @test */
    public function validaCampoBancoTest()
    {
        $response = $this->post('/contas', [
            'tipoConta' => 1,
            'bancoFebraban' => '',
            'numeroDaConta' => '123456',
            'numeroAgencia' => '12345',
            'cpfTitular' => '09388556038'
        ]);

        $response->assertSessionHasErrors('tipoConta');
    }

    /** @test */
    public function validaCampoNumeroContaTest()
    {
        $response = $this->post('/contas', [
            'tipoConta' => 1,
            'bancoFebraban' => '001',
            'numeroDaConta' => '',
            'numeroAgencia' => '12345',
            'cpfTitular' => '09388556038'
        ]);

        $response->assertSessionHasErrors('tipoConta');
    }

    /** @test */
    public function validaCampoAgenciaContaTest()
    {
        $response = $this->post('/contas', [
            'tipoConta' => 1,
            'bancoFebraban' => '001',
            'numeroDaConta' => '123456',
            'numeroAgencia' => '',
            'cpfTitular' => '09388556038'
        ]);

        $response->assertSessionHasErrors('tipoConta');
    }

    /** @test */
    public function validaCampoCPFTest()
    {
        $response = $this->post('/contas', [
            'tipoConta' => 1,
            'bancoFebraban' => '001',
            'numeroDaConta' => '123456',
            'numeroAgencia' => '12345',
            'cpfTitular' => ''
        ]);

        $response->assertSessionHasErrors('tipoConta');
    }

    /** @test */
    public function alteraDadosContaTest()
    {
        $this->post('/contas', $this->data());

        $conta = Conta::first();

        $response = $this->patch($conta->path(), [
            'numeroDaConta' => '654321',
            'numeroAgencia' => '54321',
        ]);

        $this->assertEquals('654321', Conta::first()->numeroDaConta);
        $this->assertEquals('54321', Conta::first()->numeroAgencia);
        $response->assertRedirect($conta->fresh()->path());
    }

    /** @test */
    public function deletaContaTest()
    {
        $this->post('/contas', $this->data());

        $conta = Conta::first();
        $this->assertCount(1, Conta::all());

        $response = $this->delete($conta->path());

        $this->assertCount(0, Conta::all());
        $response->assertRedirect('/contas');
    }
    
    /** @test */
    public function saqueContaCorrenteTest()
    {
        $this->withoutExceptionHandling();
    }

    private function data()
    {
        return [
            'tipoConta' => 1,
            'bancoFebraban' => '001',
            'numeroDaConta' => '123456',
            'numeroAgencia' => '12345',
            'cpfTitular' => '09388556038'
        ];
    }
}
