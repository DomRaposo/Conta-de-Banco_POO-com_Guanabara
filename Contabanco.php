<?php

class Contabanco
{
    public $numconta;
    protected $tipo;

    private $dono;
    private $saldo;
    private $status;

    public function __construct() {
        $this->saldo = 0;
        $this->status = false;

    }


    function abrirConta($t)
    {
        $this->setTipo($t);
        $this->setStatus(true);
        if ($t == "CC") {
            $this-> setSaldo(50);
        }else {
            $t == "CP";
            $this->setSaldo(150);
        }

    }
    function fecharConta()
    {
        if ( $this->getSaldo() > 0){
            echo "<p>Conta ainda contem um saldo.</p>";
        }elseif($this->getSaldo() < 0) {
            echo "<p>Conta em debito</p>";

        }else {
            $this->setStatus(false);
            echo "<p>Conta do ".$this->getDono()." fechada com sucesso.</p>";
        }

    }
    function depositar($v)
    {
        if ($this->getStatus($v)) {
            $this->setSaldo($this->getSaldo() + $v);
            echo "<p>Depósito de R$ $v na conta de ".$this->getDono()."</p>";
        }else {
            echo "<p>Conta fechada ,não consigo depositar.</p>";
        }
    }
    function sacar($v)
    {
        if ($this->getStatus()){
            if ($this->getSaldo() > $v){
                $this->setSaldo($this->getSaldo() - $v);
                echo "<p>Saque de R$ $v autorizado na conta de ".$this->getDono()."</p>";
            }else {
                echo "Saldo insuficiente para saque.";
            }
        }else {
            echo "Impossivel sacar de uma conta Inativa";
        }
    }
    function pagarMensal()
    {
        if ($this->getTipo() == "CC") {
            $v = 12;
        }elseif ($this->getTipo() == "CP") {
            $v = 20;
        }
        if ($this->getStatus()) {
            $this->setSaldo($this->getSaldo() - $v);
            echo "<p>Mensalidade de R$ $v debitada na conta de ".$this->getDono()."</p>";
        }else {
            echo "<p>Problemas com a conta. Não posso cobrar.</p>";
        }
    }

    /**
     * @return mixed
     */
    public function getNumconta()
    {
        return $this->numconta;
    }

    /**
     * @param mixed $numconta
     */
    public function setNumconta($numconta)
    {
        $this->numconta = $numconta;

    }

    /**
     * @return mixed
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * @param mixed $tipo
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

    }

    /**
     * @return mixed
     */
    public function getDono()
    {
        return $this->dono;
    }

    /**
     * @param mixed $dono
     */
    public function setDono($dono)
    {
        $this->dono = $dono;
    }

    /**
     * @return mixed
     */
    public function getSaldo()
    {
        return $this->saldo;
    }

    /**
     * @param mixed $saldo
     */
    public function setSaldo($saldo)
    {
        $this->saldo = $saldo;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

}
