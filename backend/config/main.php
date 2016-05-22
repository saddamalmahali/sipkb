<?php
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
			'auth' => [
				'class' => 'app\modules\auth\Module',
			],
			'master' => [
				'class' => 'app\modules\master\Module',
			],
            'gridview' =>  [
                'class' => '\kartik\grid\Module'
                // enter optional module parameters below - only if you need to  
                // use your own export download action or custom translation 
                // message source
                // 'downloadAction' => 'gridview/export/download',
                // 'i18n' => []
            ]
		],
    'components' => [
		
		'assetManager' => [
			'bundles' => [
				'dmstr\web\AdminLteAsset' => [
					'skin' => 'skin-green',
				],
			],
		],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
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
            'showScriptName' => true,
            'rules' => [
            ],
        ],
        
    ],
    'params' => $params,
];
