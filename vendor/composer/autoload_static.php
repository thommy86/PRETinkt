<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit496254e285f284e83dd97b864ee56e40
{
    public static $files = array (
        '0e6d7bf4a5811bfa5cf40c5ccd6fae6a' => __DIR__ . '/..' . '/symfony/polyfill-mbstring/bootstrap.php',
        '5255c38a0faeba867671b61dfda6d864' => __DIR__ . '/..' . '/paragonie/random_compat/lib/random.php',
        '72579e7bd17821bb1321b87411366eae' => __DIR__ . '/..' . '/illuminate/support/helpers.php',
    );

    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Symfony\\Polyfill\\Mbstring\\' => 26,
            'Symfony\\Component\\Translation\\' => 30,
        ),
        'I' => 
        array (
            'Illuminate\\Support\\' => 19,
            'Illuminate\\Database\\' => 20,
            'Illuminate\\Contracts\\' => 21,
            'Illuminate\\Container\\' => 21,
        ),
        'C' => 
        array (
            'Carbon\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Symfony\\Polyfill\\Mbstring\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-mbstring',
        ),
        'Symfony\\Component\\Translation\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/translation',
        ),
        'Illuminate\\Support\\' => 
        array (
            0 => __DIR__ . '/..' . '/illuminate/support',
        ),
        'Illuminate\\Database\\' => 
        array (
            0 => __DIR__ . '/..' . '/illuminate/database',
        ),
        'Illuminate\\Contracts\\' => 
        array (
            0 => __DIR__ . '/..' . '/illuminate/contracts',
        ),
        'Illuminate\\Container\\' => 
        array (
            0 => __DIR__ . '/..' . '/illuminate/container',
        ),
        'Carbon\\' => 
        array (
            0 => __DIR__ . '/..' . '/nesbot/carbon/src/Carbon',
        ),
    );

    public static $prefixesPsr0 = array (
        'T' => 
        array (
            'Twig_' => 
            array (
                0 => __DIR__ . '/..' . '/twig/twig/lib',
            ),
        ),
        'D' => 
        array (
            'Doctrine\\Common\\Inflector\\' => 
            array (
                0 => __DIR__ . '/..' . '/doctrine/inflector/lib',
            ),
        ),
    );

    public static $classMap = array (
        'App' => __DIR__ . '/../..' . '/app/core/App.php',
        'Beoordeling' => __DIR__ . '/../..' . '/app/models/Beoordeling.php',
        'Bestelling' => __DIR__ . '/../..' . '/app/models/Bestelling.php',
        'BestellingProduct' => __DIR__ . '/../..' . '/app/models/BestellingProduct.php',
        'Configuratie' => __DIR__ . '/../..' . '/app/models/Configuratie.php',
        'Controller' => __DIR__ . '/../..' . '/app/core/Controller.php',
        'ControllerBase' => __DIR__ . '/../..' . '/app/controllers/ControllerBase.php',
        'Home' => __DIR__ . '/../..' . '/app/controllers/home.php',
        'Klant' => __DIR__ . '/../..' . '/app/models/Klant.php',
        'Merk' => __DIR__ . '/../..' . '/app/models/Merk.php',
        'Product' => __DIR__ . '/../..' . '/app/models/Product.php',
        'View' => __DIR__ . '/../..' . '/app/core/View.php',
        'VraagAntwoord' => __DIR__ . '/../..' . '/app/models/VraagAntwoord.php',
        'Zoekterm' => __DIR__ . '/../..' . '/app/models/Zoekterm.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit496254e285f284e83dd97b864ee56e40::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit496254e285f284e83dd97b864ee56e40::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit496254e285f284e83dd97b864ee56e40::$prefixesPsr0;
            $loader->classMap = ComposerStaticInit496254e285f284e83dd97b864ee56e40::$classMap;

        }, null, ClassLoader::class);
    }
}
