<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit60ccc1746cb3eb9a80d31a6e5f30184a
{
    public static $prefixLengthsPsr4 = array (
        'O' => 
        array (
            'OSS\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'OSS\\' => 
        array (
            0 => __DIR__ . '/..' . '/aliyuncs/oss-sdk-php/src/OSS',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit60ccc1746cb3eb9a80d31a6e5f30184a::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit60ccc1746cb3eb9a80d31a6e5f30184a::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
