<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit026d261dbb341b301129b7726860cf24
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'Mpdf\\QrCode\\' => 12,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Mpdf\\QrCode\\' => 
        array (
            0 => __DIR__ . '/..' . '/mpdf/qrcode/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit026d261dbb341b301129b7726860cf24::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit026d261dbb341b301129b7726860cf24::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit026d261dbb341b301129b7726860cf24::$classMap;

        }, null, ClassLoader::class);
    }
}