<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit999f2dbed4e96b85679bcc2d59b6ea6b
{
    public static $files = array (
        '0e6d7bf4a5811bfa5cf40c5ccd6fae6a' => __DIR__ . '/..' . '/symfony/polyfill-mbstring/bootstrap.php',
    );

    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'Twig\\' => 5,
            'Tribe\\Project\\' => 14,
            'Tribe\\Libs\\' => 11,
        ),
        'S' => 
        array (
            'Symfony\\Polyfill\\Mbstring\\' => 26,
        ),
        'J' => 
        array (
            'JBZoo\\PimpleDumper\\' => 19,
        ),
        'C' => 
        array (
            'Composer\\Installers\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Twig\\' => 
        array (
            0 => __DIR__ . '/..' . '/twig/twig/src',
        ),
        'Tribe\\Project\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
        'Tribe\\Libs\\' => 
        array (
            0 => __DIR__ . '/..' . '/moderntribe/tribe-libs/src',
        ),
        'Symfony\\Polyfill\\Mbstring\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-mbstring',
        ),
        'JBZoo\\PimpleDumper\\' => 
        array (
            0 => __DIR__ . '/..' . '/jbzoo/pimpledumper/src',
        ),
        'Composer\\Installers\\' => 
        array (
            0 => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers',
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
        'P' => 
        array (
            'Pimple' => 
            array (
                0 => __DIR__ . '/..' . '/pimple/pimple/src',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit999f2dbed4e96b85679bcc2d59b6ea6b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit999f2dbed4e96b85679bcc2d59b6ea6b::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit999f2dbed4e96b85679bcc2d59b6ea6b::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
