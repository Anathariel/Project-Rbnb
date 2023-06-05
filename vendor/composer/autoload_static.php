<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit9b1244647aa5adce49683bb910b74572
{
    public static $files = array (
        '320cde22f66dd4f5d3fd621d3e88b98f' => __DIR__ . '/..' . '/symfony/polyfill-ctype/bootstrap.php',
        '0e6d7bf4a5811bfa5cf40c5ccd6fae6a' => __DIR__ . '/..' . '/symfony/polyfill-mbstring/bootstrap.php',
    );

    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'Twig\\' => 5,
        ),
        'S' => 
        array (
            'Symfony\\Polyfill\\Mbstring\\' => 26,
            'Symfony\\Polyfill\\Ctype\\' => 23,
            'Symfony\\Component\\Asset\\' => 24,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Twig\\' => 
        array (
            0 => __DIR__ . '/..' . '/twig/twig/src',
        ),
        'Symfony\\Polyfill\\Mbstring\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-mbstring',
        ),
        'Symfony\\Polyfill\\Ctype\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-ctype',
        ),
        'Symfony\\Component\\Asset\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/asset',
        ),
    );

    public static $classMap = array (
        'AccomodationType' => __DIR__ . '/../..' . '/class/AccomodationType.php',
        'AltoRouter' => __DIR__ . '/..' . '/altorouter/altorouter/AltoRouter.php',
        'CancellationPolicy' => __DIR__ . '/../..' . '/class/CancellationPolicy.php',
        'Comment' => __DIR__ . '/../..' . '/class/Comment.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'Controller' => __DIR__ . '/../..' . '/controller/Controller.php',
        'Conversation' => __DIR__ . '/../..' . '/class/Conversation.php',
        'Favorite' => __DIR__ . '/../..' . '/class/Favorite.php',
        'HomeController' => __DIR__ . '/../..' . '/controller/HomeController.php',
        'HostLanguage' => __DIR__ . '/../..' . '/class/HostLanguage.php',
        'HouseRules' => __DIR__ . '/../..' . '/class/HouseRules.php',
        'Invoice' => __DIR__ . '/../..' . '/class/Invoice.php',
        'Message' => __DIR__ . '/../..' . '/class/Message.php',
        'MessageStatus' => __DIR__ . '/../..' . '/class/MessageStatus.php',
        'Model' => __DIR__ . '/../..' . '/model/Model.php',
        'Payment' => __DIR__ . '/../..' . '/class/Payment.php',
        'Property' => __DIR__ . '/../..' . '/class/Property.php',
        'PropertyAmenities' => __DIR__ . '/../..' . '/class/PropertyAmenities.php',
        'PropertyController' => __DIR__ . '/../..' . '/controller/PropertyController.php',
        'PropertyImages' => __DIR__ . '/../..' . '/class/PropertyImages.php',
        'PropertyModel' => __DIR__ . '/../..' . '/model/PropertyModel.php',
        'Reservation' => __DIR__ . '/../..' . '/class/Reservation.php',
        'Tag' => __DIR__ . '/../..' . '/class/Tag.php',
        'TagModel' => __DIR__ . '/../..' . '/model/TagModel.php',
        'User' => __DIR__ . '/../..' . '/class/User.php',
        'UserController' => __DIR__ . '/../..' . '/controller/UserController.php',
        'UserModel' => __DIR__ . '/../..' . '/model/UserModel.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit9b1244647aa5adce49683bb910b74572::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit9b1244647aa5adce49683bb910b74572::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit9b1244647aa5adce49683bb910b74572::$classMap;

        }, null, ClassLoader::class);
    }
}
