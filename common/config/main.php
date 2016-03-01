<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
	'modules' => [
			'auth' => [
				'class' => 'common\modules\auth\Module',
			],
		],
    'components' => [
		
	
		'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
];
