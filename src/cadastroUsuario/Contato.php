<?php

namespace App\cadastroUsuario;

class Contato
{

    private $email;
    private $endereco;
    private $cep;
    private $telefone;


    public function __construct(string $email, string $endereco, string $cep, string $telefone)
    {
        

        if ($this->validaEmail($email) !== false){
            $this->setEmail($email);
        } else {
            $this->setEmail("Email Inválido");
        }

        $this->endereco = $endereco;
        $this->cep = $cep;


        

        if ($this->validaTelefone($telefone)){
            $this->setTelefone($telefone); 
        } else {
            $this->telefone = "Telefone inválido";
        }

    }


    public function setEmail(string $email): void
    {
        $this->email = $email;
    }


    public function getUsuario(): string
    {
        $posicaoArroba = strpos($this->email, '@');

        if(empty($posicaoArroba)){
            return 'Usuário inválido';
        }
        return substr($this->email, 0, $posicaoArroba);
    }


    private function validaEmail(string $email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }


    public function getEmail(): string
    {
        return $this->email;
    }


    public function getEnderecoCep(): string
    {
        $enderecoCep = [$this->endereco, $this->cep];
        return implode(" - ", $enderecoCep);

    }


    public function getCep(): string
    {
        return $this->cep;
    }

    private function validaTelefone(string $telefone): int
    {
        return preg_match('/^[0-9]{4}-[0-9]{4}$/', $telefone, $encontrados);
    }

    private function setTelefone(string $telefone): void
    {
        $this->telefone = $telefone;
    }

    public function getTelefone(): string
    {
        return $this->telefone;
    }
    


}


?>