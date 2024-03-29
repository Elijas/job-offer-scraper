<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit3c861aa80a8b789fd7c895882b47bd88
{
    public static $prefixLengthsPsr4 = array (
        'J' => 
        array (
            'JsonSchema\\' => 11,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'JsonSchema\\' => 
        array (
            0 => __DIR__ . '/..' . '/justinrainbow/json-schema/src/JsonSchema',
        ),
    );

    public static $classMap = array (
        'Callback' => __DIR__ . '/..' . '/wittiws/phpquery/phpQuery/phpQuery/Callback.php',
        'CallbackBody' => __DIR__ . '/..' . '/wittiws/phpquery/phpQuery/phpQuery/Callback.php',
        'CallbackParam' => __DIR__ . '/..' . '/wittiws/phpquery/phpQuery/phpQuery/Callback.php',
        'CallbackParameterToReference' => __DIR__ . '/..' . '/wittiws/phpquery/phpQuery/phpQuery/Callback.php',
        'CallbackReturnReference' => __DIR__ . '/..' . '/wittiws/phpquery/phpQuery/phpQuery/Callback.php',
        'CallbackReturnValue' => __DIR__ . '/..' . '/wittiws/phpquery/phpQuery/phpQuery/Callback.php',
        'DOMDocumentWrapper' => __DIR__ . '/..' . '/wittiws/phpquery/phpQuery/phpQuery/DOMDocumentWrapper.php',
        'DOMEvent' => __DIR__ . '/..' . '/wittiws/phpquery/phpQuery/phpQuery/DOMEvent.php',
        'ICallbackNamed' => __DIR__ . '/..' . '/wittiws/phpquery/phpQuery/phpQuery/Callback.php',
        'phpQuery' => __DIR__ . '/..' . '/wittiws/phpquery/phpQuery/phpQuery.php',
        'phpQueryEvents' => __DIR__ . '/..' . '/wittiws/phpquery/phpQuery/phpQuery/phpQueryEvents.php',
        'phpQueryObject' => __DIR__ . '/..' . '/wittiws/phpquery/phpQuery/phpQuery/phpQueryObject.php',
        'phpQueryObjectPlugin_Scripts' => __DIR__ . '/..' . '/wittiws/phpquery/phpQuery/phpQuery/plugins/Scripts.php',
        'phpQueryObjectPlugin_WebBrowser' => __DIR__ . '/..' . '/wittiws/phpquery/phpQuery/phpQuery/plugins/WebBrowser.php',
        'phpQueryObjectPlugin_example' => __DIR__ . '/..' . '/wittiws/phpquery/phpQuery/phpQuery/plugins/example.php',
        'phpQueryPlugin_Scripts' => __DIR__ . '/..' . '/wittiws/phpquery/phpQuery/phpQuery/plugins/Scripts.php',
        'phpQueryPlugin_WebBrowser' => __DIR__ . '/..' . '/wittiws/phpquery/phpQuery/phpQuery/plugins/WebBrowser.php',
        'phpQueryPlugin_example' => __DIR__ . '/..' . '/wittiws/phpquery/phpQuery/phpQuery/plugins/example.php',
        'phpQueryPlugins' => __DIR__ . '/..' . '/wittiws/phpquery/phpQuery/phpQuery.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit3c861aa80a8b789fd7c895882b47bd88::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit3c861aa80a8b789fd7c895882b47bd88::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit3c861aa80a8b789fd7c895882b47bd88::$classMap;

        }, null, ClassLoader::class);
    }
}
