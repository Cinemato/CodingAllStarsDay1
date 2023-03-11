<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit79a42f9f1c3bda875138ea85dd1ed9cc
{
    public static $prefixLengthsPsr4 = array (
        'W' => 
        array (
            'Webmozart\\Assert\\' => 17,
        ),
        'L' => 
        array (
            'LanguageDetector\\' => 17,
        ),
        'B' => 
        array (
            'Browser\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Webmozart\\Assert\\' => 
        array (
            0 => __DIR__ . '/..' . '/webmozart/assert/src',
        ),
        'LanguageDetector\\' => 
        array (
            0 => __DIR__ . '/..' . '/landrok/language-detector/src/LanguageDetector',
        ),
        'Browser\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpcasperjs/phpcasperjs/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit79a42f9f1c3bda875138ea85dd1ed9cc::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit79a42f9f1c3bda875138ea85dd1ed9cc::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit79a42f9f1c3bda875138ea85dd1ed9cc::$classMap;

        }, null, ClassLoader::class);
    }
}