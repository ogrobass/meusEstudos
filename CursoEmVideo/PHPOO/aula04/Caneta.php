<?php

class Caneta {
    private $modelo;
    private $cor;
    private $ponta;
    private $tampada;    

    function __construct($modelo, $cor, $ponta, $tampada) {
        $this->modelo = $modelo;
        $this->cor = $cor;
        $this->ponta = $ponta;
        $this->tampada = $tampada;
    }

    function getModelo() {
        return $this->modelo;
    }

    function getCor() {
        return $this->cor;
    }

    function getPonta() {
        return $this->ponta;
    }

    function getTampada() {
        return $this->tampada;
    }

    function setModelo($modelo) {
        $this->modelo = $modelo;
    }

    function setCor($cor) {
        $this->cor = $cor;
    }

    function setPonta($ponta) {
        $this->ponta = $ponta;
    }

    function setTampada($tampada) {
        $this->tampada = $tampada;
    }


}
