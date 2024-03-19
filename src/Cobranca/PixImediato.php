<?php

namespace ctodobom\APInterPHP\Cobranca;

use ctodobom\APInterPHP\BancoInter;

class PixImediato implements \JsonSerializable
{
    private $txid = ''; //Chave única de transação do recebedor
    private $calendario = null; //['expiracao' => int segundos] *
    private $devedor = null; //Opcional Identificar o devedor - [cpf(11),nome(200)], [cnpj(14),nome(200)]
    private $valor = null; //[original double]*
    private $chave = ''; //Chave pix do recebedor
    private $location = ''; //URL do QR Code pix do recebedor
    private $status = ''; //URL do QR Code pix do recebedor
    private $solicitacaoPagador = ''; //140 chars texto descritivo
    private $infoAdicionais = []; //lista array nome,valor]

    private $controller = null;

    /**
    * Factory method to instance a new Pix from API return
    * @return self
    */

    public static function fromStdClass(\stdClass $obj) {
        $pix = new self();
        foreach ($obj as $property => $value) {
            $pix->$property = $value;
        }
        return $pix;
    }

    /**
     * @return string
     */
    public function getTxId()
    {
        return $this->txid;
    }

    /**
     * @param string $txid
     */
    public function setTxId($txid)
    {
        $this->txid = $txid;
    }

    /**
     * @return Calendario
     */
    public function getCalendario()
    {
        return $this->calendario;
    }

    /**
     * @param Calendario $calendario
     */
    public function setCalendario($calendario)
    {
        $this->calendario = $calendario;
    }

    /**
     * @return Devedor
     */
    public function getDevedor()
    {
        return $this->devedor;
    }

    /**
     * @param Devedor $devedor
     */

    public function setDevedor($devedor)
    {
        $this->devedor = $devedor;
    }

    /**
     * @return Valor
     */
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * @param Valor $valor
     */

    public function setValor(Valor $valor)
    {
        $this->valor = $valor;
    }

    /**
     * @return string
     */
    public function getChave()
    {
        return $this->chave;
    }

    /**
     * @param string $chave
     */
    public function setChave($chave)
    {
        $this->chave = $chave;
    }

    /**
     * @return string
     */
    public function getLocation()
    {
        return $this->location;
    }

    public function setLocation($locationUrl)
    {
        $this->location = $locationUrl;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getSolicitacaoPagador()
    {
        return $this->solicitacaoPagador;
    }

    /**
     * @return string $solicitacao
     */
    public function setSolicitacaoPagador($solicitacao)
    {
        $this->solicitacaoPagador = $solicitacao;
    }

    /**
     * @return array
     */
    public function getInfoAdicionais()
    {
        return $this->infoAdicionais;
    }

    /**
     *
     * @param BancoInter $controller
     */
    public function setController(BancoInter $controller)
    {
        $this->controller = $controller;
    }

    public function __construct()
    {
        $this->calendario = new Calendario();
        $this->devedor = new Devedor();
        $this->valor = new Valor();

        $this->infoAdicionais = [];

    }

    public function jsonSerialize(): array
    {
        return get_object_vars($this);
    }
}
