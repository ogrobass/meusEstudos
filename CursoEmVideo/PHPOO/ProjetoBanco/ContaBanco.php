<?php

class ContaBanco {
    //Atributos
    public $numConta;
    protected $tipo;
    private $dono;
    private $saldo;
    private $status;
    
    //Métodos
    
    public function abrirConta($t){
        $this->setTipo($t);
        $this->setStatus(true);
        if ($t == "CC") {
            $this->setSaldo(50);
        } elseif ($t == "CP") {
            $this->saldo = 150;
        }
    }
    
    public function fecharConta() {
        if ($this->getSaldo() > 0) {
            echo "<p>Conta ainda possui dinheiro, não posso fechá-la!</p>";
        } elseif ($this->getSaldo() < 0) {
            echo "<p>Conta esta´com débito. Impossivel encerrar!</p>";
        } else {
            $this->getStatus(false);
            echo "<p>Conta de ". $this->getDono()." fechada com sucesso!</p>";
        }         
    }
    
    public function depositar($v) {
        if ($this->getStatus()) {
            $this->setSaldo($this->getSaldo() + $v);
            //$this->saldo = $this->saldo + $v;
            echo "<p>Deposito de $v autorizado com sucesso na conta de ". $this->getDono().".</p>";
        } else {
            echo "<p>Conta fechada. Não consigo depositar</p>";
        }
    }
    
    public function sacar($v) {
        if ($this->getStatus()) {
            if ($this->getSaldo() >= $v) {
                $this->setSaldo($this->getSaldo() - $v);
                //$this->saldo = $this->saldo - $v;  
                echo "<p>Saque de $v autorizado com sucesso na conta de ". $this->getDono().".</p>"; 
            } else {
                echo "<p>Saldo insuficiente para saque.</p>"; 
            }
        } else {
            echo "<p>Não é possivel sacar de uma conta fechada.</p>";
        } 
    }
        
    public function pagarMensal() {
        if ($this->getTipo() == "CC") {
            $v = 12;
        } elseif ($this->getTipo() == "CP") {
            $v = 20;
        }    
        
        if ($this->getStatus()) {
            $this->setSaldo($this->getSaldo() - $v);
            echo "<p>Mensalidade de R$ $v debitada na conta de ".$this->getDono().".</p>";
        } else {
            echo "<p>Problemas com a conta, não posso cobrar.</p>";
        }
    }
    
    //Métodos especiais
    function __construct() {
        $this->setSaldo(0);
        $this->setStatus(false);
        echo "<p>Conta criada com sucesso!</p>";
    }
    
    /*GETTER*/
    function getNumConta() {
        return $this->numConta;
    }
    
    function getTipo() {
        return $this->tipo;
    }

    function getDono() {
        return $this->dono;
    }

    function getSaldo() {
        return $this->saldo;
    }

    function getStatus() {
        return $this->status;
    }

    
    /*SETERS*/
    function setNumConta($numConta) {
        $this->numConta = $numConta;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    function setDono($dono) {
        $this->dono = $dono;
    }

    function setSaldo($saldo) {
        $this->saldo = $saldo;
    }

    function setStatus($status) {
        $this->status = $status;
    }


}
