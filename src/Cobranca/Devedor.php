<?php

namespace ctodobom\APInterPHP\Cobranca;

class Devedor implements \JsonSerializable
{
    private $tipoPessoa = 'J';
    private $cpf = '';
    private $cnpj = '';
    private $nome = '';
    private $cidade = ''; // Nova propriedade
    private $uf = ''; // Nova propriedade
    private $cep = ''; // Nova propriedade
    private $logradouro = ''; // Nova propriedade

        /*
     * @return string
     */
    public function getTipoPessoa()
    {
        return $this->tipoPessoa;
    }

    /*
     * @param string
     */
    public function setTipoPessoa($tipoPessoa) 
    {
        $this->tipoPessoa = $tipoPessoa;
    }

    /*
     * @return string
     */
    public function getCpf()
    {
        return $this->cpf;
    }

    /*
     * @param string $cpf
     */
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }
    

    /*
     * @return string
     */
    public function getCnpj()
    {
        return $this->cnpj;
    }

    /*
     * @param string $cnpj
     */
    public function setCnpj($cnpj)
    {
        $this->cnpj = $cnpj;
    }

    /*
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /*
     * @param string $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    // Novos métodos para a propriedade cidade
    public function getCidade()
    {
        return $this->cidade;
    }

    public function setCidade($cidade)
    {
        $this->cidade = $cidade;
    }

    // Novos métodos para a propriedade uf
    public function getUf()
    {
        return $this->uf;
    }

    public function setUf($uf)
    {
        $this->uf = $uf;
    }

    // Novos métodos para a propriedade cep
    public function getCep()
    {
        return $this->cep;
    }

    public function setCep($cep)
    {
        $this->cep = $cep;
    }

    // Novos métodos para a propriedade logradouro
    public function getLogradouro()
    {
        return $this->logradouro;
    }

    public function setLogradouro($logradouro)
    {
        $this->logradouro = $logradouro;
    }

    public function jsonSerialize(): array
    {
        $return = new \stdClass();

        if ($this->tipoPessoa == 'J') {
            $return->cnpj = $this->cnpj;
        } else {
            $return->cpf = $this->cpf;
        }

        $return->nome = $this->nome;
        $return->cidade = $this->cidade; // Adiciona cidade ao objeto JSON
        $return->uf = $this->uf; // Adiciona uf ao objeto JSON
        $return->cep = $this->cep; // Adiciona cep ao objeto JSON
        $return->logradouro = $this->logradouro; // Adiciona logradouro ao objeto JSON

        return get_object_vars($return);
    }
}
