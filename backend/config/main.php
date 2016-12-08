<?php
use \kartik\datecontrol\Module;

$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
   'modules' => [
   'datecontrol' =>  [
        'class' => '\kartik\datecontrol\Module',
       'displaySettings' => [
            Module::FORMAT_DATE => 'yyyy-MM-dd',
            Module::FORMAT_TIME => 'hh:mm:ss ',
            Module::FORMAT_DATETIME => 'yyyy-MM-dd hh:mm:ss ', 
        ],
       'saveSettings' => [
            Module::FORMAT_DATE => 'php:U', // saves as unix timestamp
            Module::FORMAT_TIME => 'php:H:i:s',
            Module::FORMAT_DATETIME => 'php:Y-m-d H:i:s',
        ],
         // set your display timezone
        'displayTimezone' => 'Africa/Nairobi    ',
 
        // set your timezone for date saved to db
        'saveTimezone' => 'UTC',
        
        // automatically use kartik\widgets for each of the above formats
        'autoWidget' => true,
       'autoWidgetSettings' => [
            Module::FORMAT_DATE => ['type'=>2, 'pluginOptions'=>['autoclose'=>true]], // example
            Module::FORMAT_DATETIME => [], // setup if needed
            Module::FORMAT_TIME => [], // setup if needed
        ],
       
       
    ]
],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        
    ],
    'params' => $params,
];
