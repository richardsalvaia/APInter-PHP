<?php

namespace ctodobom\APInterPHP\Cobranca;

class Valor implements \JsonSerializable
{
    private $original = 0;

    /*
     * @return double
     */
    public function getOriginal()
    {
        return $this->original;
    }

    /**
     * @param double original
     */
    public function setOriginal($original)
    {
        $this->original = $original;
    }

    public function jsonSerialize(): array
    {
        return get_object_vars($this);
    }
    
}
