<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticIniteb1eca43ed087fae1fbbc2006ce711dc
{
    public static $classMap = array (
        'Conexao' => __DIR__ . '/../..' . '/model/Conexao.class.php',
        'Produtos' => __DIR__ . '/../..' . '/model/Produtos.class.php',
        'Rotas' => __DIR__ . '/../..' . '/model/Rotas.class.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticIniteb1eca43ed087fae1fbbc2006ce711dc::$classMap;

        }, null, ClassLoader::class);
    }
}
