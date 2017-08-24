<?php

require "class/Produso.php";

$produto = new Produto();
$produto->setPreco(59.9);


$outroProduto = new Produto();
$outroProduto->setPreco(59.9);

if($produto == $outroProduto){
    echo "são iguais";
} else {
    echo "sao diferentes";
}