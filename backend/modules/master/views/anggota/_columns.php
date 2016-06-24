<?php
use yii\helpers\Url;

return [
    [
        'class' => 'kartik\grid\CheckboxColumn',
        'width' => '20px',
    ],
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],
        
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'nama_anggota',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'jenis_kelamin',
        'hAlign'=>'center'
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'tempat_lahir',
        'hAlign'=>'center'
    ],

    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'alamat_anggota',
        'hAlign'=>'center'
    ],

    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'kontak',
        'value'=> function($model){
            $kontak = $model->getAnggotaDetile()->one();



            return $kontak != null ? $kontak->no_hp: "Kosong";
        },
        'hAlign'=>'center'
    ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'tanggal_lahir',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'alamat_anggota',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'kecamatan',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'kabupaten',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'no_ktp',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'status',
    // ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'vAlign'=>'middle',
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