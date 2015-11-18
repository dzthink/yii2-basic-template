<?php

defined("CONFIG_DIR") or define("CONFIG_DIR", __DIR__ . DIRECTORY_SEPARATOR . YII_ENV);

$params = require(CONFIG_DIR . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => array_merge([
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => require(CONFIG_DIR . DIRECTORY_SEPARATOR. 'log.php'),
        'db' => require(CONFIG_DIR . DIRECTORY_SEPARATOR. 'database.php'),
    ],require(CONFIG_DIR . DIRECTORY_SEPARATOR . 'components.php')),

    'params' => require(CONFIG_DIR . DIRECTORY_SEPARATOR . 'params.php')
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
