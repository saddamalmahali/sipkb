<?php
use yii\helpers\Url;
use app\modules\master\models\AnakCabang;

return [
    [
        'class' => 'kartik\grid\CheckboxColumn',
        'width' => '20px',
    ],
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'id',
    // ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'id_anak_cabang',
        'format'=>'raw',
        'hAlign'=>'center',
        'value'=>function($model){
            $anak_cabang = AnakCabang::find()->where(['id'=>$model->id_anak_cabang])->one();

            return $anak_cabang->nama;
        }
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'periode',
        'hAlign'=>'center',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'no_sk',
        'hAlign'=>'center',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'tanggal_sk',
        'hAlign'=>'center',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'berlaku_sk',
        'hAlign'=>'center',
    ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'file_sk',
    // ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'vAlign'=>'middle',
        'hAlign'=>'center',
        'urlCreator' => function($action, $model, $key, $index) { 
                return Url::to([$action,'id'=>$key]);
        },
        'viewOptions'=>['role'=>'modal-remote','title'=>'View','data-toggle'=>'tooltip'],
        'updateOptions'=>['role'=>'modal-remote','title'=>'Update', 'data-toggle'=>'tooltip'],
        'deleteOptions'=>['role'=>'modal-remote','title'=>'Delete', 
                          'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                          'data-request-method'=>'post',
                          'data-toggle'=>'tooltip',
                          'data-confirm-title'=>'Are you sure?',
                          'data-confirm-message'=>'Are you sure want to delete this item'], 
    ],

];   