<?php

class Conexao{

    private $host = "localhost",
            $user = "root",
            $senha = "",
            $banco = "cursoapi";
        protected $obj;

    function __construct() {

        try{

            if($this->Conectar()==NULL):
                $this->conectar();
    
            endif;

        } catch (Exception $e){

            echo 'Erro de conexão ' . $e->getMessage();
            exit();
        }
        


    }
    // retorna um PDO com a conexão
    function Conectar(){
        
        $options = array( PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");

        $link = new PDO("mysql:host={$this->host};dbname={$this->banco}",
                $this->user, $this->senha, $options);

        return $link;

    }

    // Faz a execução da QUERY
    function ExecuteSQL($query, array $params=NULL){

        $this->obj = $this->Conectar()->prepare($query);

        return $this->obj->execute();

    }

    //Lista os dados em um ARRAY
    function ListarDados(){

        return $this->obj->fetchALL(PDO::FETCH_ASSOC);

    }

    //Conta os registros afetados/retornados
    function Total(){

        return $this->obj->rowCount();
    }

}

