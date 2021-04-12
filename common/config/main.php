<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
    'language' => 'ru-RU',
    'sourceLanguage' => 'ru-RU',
    'timeZone' => 'Europe/Moscow',
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=db',
            'username' => 'u',
            'password' => 'p',
            'charset' => 'utf8',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
//        'mailer' => function(){
//            return Yii::createObject([
//                'class' => 'yii\swiftmailer\Mailer',
//                'viewPath' => '@common/mail',
//                'transport' => [
//                    'class' => 'Swift_SmtpTransport',
//                    'host' => \common\models\setting\Setting::take()->mail->host,
//                    'username' => \common\models\setting\Setting::take()->mail->username,
//                    'password' => \common\models\setting\Setting::take()->mail->password,
//                    'port' => \common\models\setting\Setting::take()->mail->port,
//                    'encryption' => \common\models\setting\Setting::take()->mail->encryption,
//                ],
//                'useFileTransport' => false,
//            ]);
//            },
    ],
];
