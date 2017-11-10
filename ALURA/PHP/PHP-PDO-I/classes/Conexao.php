<?php 

require_once 'config.php';

class Conexao {
    public static function pegarConexao() {
        //$conexao = new PDO('mysql:host=127.0.0.1;dbname=estoque', 'root', 'root');
        $conexao = new PDO(DB_DRIVE.':host='.DB_HOSTNAME.';dbname='.DB_DATABASE, DB_USERNAME, DB_PASSWORD);
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conexao;
    }
}