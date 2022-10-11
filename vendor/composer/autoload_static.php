<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit12c2bf489e42d5341ea262ad6eda66ef
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit12c2bf489e42d5341ea262ad6eda66ef::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit12c2bf489e42d5341ea262ad6eda66ef::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit12c2bf489e42d5341ea262ad6eda66ef::$classMap;

        }, null, ClassLoader::class);
    }
}
