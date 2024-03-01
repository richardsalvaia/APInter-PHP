<?php

namespace ctodobom\APInterPHP\Cobranca;

class Calendario implements \JsonSerializable
{
    private $criacao = null;
    private $expiracao = 3600;
    private $dataDeVencimento = null; //YYYY-MM-DD
    private $validadeAposVencimento = 30;

    /*
     * @return string
     */
    public function getCriacao()
    {
        return $this->criacao;
    }

    public function setCriacao($date)
    {
        $this->criacao = $date;
    }

    public function setDataDeVencimento($date)
    {
        $this->dataDeVencimento = $date;
    }

    /*
     * @return string
     */
    public function getExpiracao()
    {
        return $this->expiracao;
    }

    public function jsonSerialize(): array
    {
        return get_object_vars($this);
    }
    
}
