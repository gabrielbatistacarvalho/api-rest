<?php
$metodo = $_SERVER['REQUEST_METHOD'];

$produtos = new Produtos();

switch ($metodo):

    case 'GET':

        if(isset(Rotas::$pag[1]) && Rotas::$pag[1]!=NULL):

            //$id = Rotas::$pag[1];
            $id = (int)Rotas::$pag[1];
            $produtos->GetProdutosID($id);

        else:
            $produtos->GetProdutos();
        endif;
            
        $dados = json_encode($produtos->ListarDados());

        echo $dados;

        break;

    case 'PUT':
        


        $dados = json_decode(file_get_contents('php://input'));
        var_dump($dados);

        $id      = $dados->pro_id;
        $nome    = $dados->pro_nome;
        $desc    = $dados->pro_desc;
        $valor   = $dados->pro_valor;
        $estoque = $dados->pro_estoque;
        $ref     = $dados->pro_ref;

        if($produtos->Update($id, $nome, $desc, $valor, $estoque, $ref)):
            echo '100%';
        else:
            echo 'Erro ao atualizar dados';
        endif;

    break;

    case 'POST':

        $dados = json_decode(file_get_contents('php://input'));
        var_dump($dados);

        $nome    = $dados->pro_nome;
        $desc    = $dados->pro_desc;
        $valor   = $dados->pro_valor;
        $estoque = $dados->pro_estoque;
        $ref     = $dados->pro_ref;

        if($produtos->Inserir($nome, $desc, $valor, $estoque, $ref)):
            echo '100%';
        else:
            echo 'Erro ao grvar dados';
        endif;

    break;

    case 'DELETE':

    if(isset(Rotas::$pag[1]) && Rotas::$pag[1]!=NULL):

        //$id = (int)Rotas::$pag[1];
        
        if($produtos->DelProdutos($id)):
            
            if($produtos->Total() > 0):

                echo 'Produto apagado com sucesso!';
            else:
                echo "Nada foi apagado, produto id {$id} não existe";
            endif;
            
        endif;
    else:
        echo 'Erro ao deletar, informação do produto incorreta!';
    endif;

    break;

endswitch;

