<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit12571d26c66cbc5066d05167909b063e
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'Apps\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Apps\\' => 
        array (
            0 => __DIR__ . '/../..' . '/class',
        ),
    );

    public static $prefixesPsr0 = array (
        'P' => 
        array (
            'Parsedown' => 
            array (
                0 => __DIR__ . '/..' . '/erusev/parsedown',
            ),
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit12571d26c66cbc5066d05167909b063e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit12571d26c66cbc5066d05167909b063e::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit12571d26c66cbc5066d05167909b063e::$prefixesPsr0;
            $loader->classMap = ComposerStaticInit12571d26c66cbc5066d05167909b063e::$classMap;

        }, null, ClassLoader::class);
    }
}
