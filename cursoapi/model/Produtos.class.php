<?php

class Produtos extends Conexao{

    // CHama o construtor pai
    function __construct(){
        parent::__construct();
    }

    // Listagem de todos os produtos
    function GetProdutos(){

        $query = "select * from produtos";
        $this->ExecuteSQL($query);
    }

    //Busca de produtos pelo ID
    function GetProdutosID($id){

        $query = "select * from produtos where pro_id = {$id}";
        $this->ExecuteSQL($query);
    }
    //Apagando o produto
    function DelProdutos($id){

        $query = "delete from produtos where pro_id = {$id}";
        
        if($this->ExecuteSQL($query)):
            return true;
        endif;
    }

    //Inserção do novo produto
    function Inserir($nome, $desc, $valor, $estoque, $ref){

        $query = "insert into produtos (pro_nome, pro_desc, pro_valor, pro_estoque, pro_ref) ";
        $query .="values";
        $query .=" ('{$nome}', '{$desc}', {$valor}, {$estoque}, '{$ref}');";

        if($this->ExecuteSQL($query)):
            return true;
        endif;
    }

    //Atualização dos dados
    function Update($id, $nome, $desc, $valor, $estoque, $ref){

        $query = "update produtos set pro_nome = '{$nome}', pro_desc = '{$desc}', pro_valor = {$valor}
                 , pro_estoque = {$estoque}, pro_ref = '{$ref}' where pro_id = {$id}";
        
        //echo $query . " ";

        if($this->ExecuteSQL($query)):
            return true;
        endif;
    }

}
