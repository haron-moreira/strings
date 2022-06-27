<?php

namespace App\cadastroUsuario;

class Usuario
{
    private $nome;
    private $sobrenome;
    private $senha;
    private $tratamento;


    public function __construct(string $nome, string $senha, string $genero)
    {

        $nomeSobrenome = explode(" ", $nome,3);

        if($nomeSobrenome[0] === ""){
            $this->nome = 'Nome inválido';
        } else {
            $this->nome = $nomeSobrenome[0];
        }

        if(empty($nomeSobrenome[1]) || $nomeSobrenome[1] === ""){

            $this->sobrenome = 'Sobrenome inválido';

        } else if(empty($nomeSobrenome[2])){

            $this->sobrenome = $nomeSobrenome[1];

        } else {

            $this->sobrenome = $nomeSobrenome[1].' '.$nomeSobrenome[2];
        }

        $this->validaSenha($senha);
        $this->tratamentoSobrenome($nome, $genero);

    }


    public function getNome(): string
    {
        return $this->nome;
    }


    public function getSobrenome(): string
    {
        return $this->sobrenome;
    }


    public function getSenha(): string
    {
        return $this->senha;
    }

    private function validaSenha(string $senha): void
    {
        $tamanhoSenha = strlen(trim($senha));

        if ($tamanhoSenha > 8){
            $this->senha = $senha;
        } else {
            $this->senha = 'Senha Inválida';
        }
    }

    private function tratamentoSobrenome(string $nome, string $genero)
    {
        if ($genero === 'M'){
            $this->tratamento = preg_replace('/^\w+\b/', 'Sr.', $nome, 1);

        }

        if ($genero === 'F'){
            $this->tratamento = preg_replace('/^\w+\b/', 'Sra.', $nome, 1);
        }
    }

    public function getTratamento(): string
    {
        return $this->tratamento;
    }

}

?>