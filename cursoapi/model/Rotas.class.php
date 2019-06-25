<?php

class Rotas{

    public static $pag;
    private static $controller = 'controller';

    public static function getPagina(){

        if(isset($_GET['pag'])):

            self::$pag = explode('/',$_GET['pag']);
            switch(self::$pag[0]):
                
                case 'produtos':
                    include self::$controller .'/produtos.php';
                break;

                case 'clientes':
                    include self::$controller .'/clientes.php';
                break;

            endswitch;


        else:

            echo '<h2> Página Home</h2>';

        endif;

    }
}

