<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\master\models\DetileKepengurusanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Detile Kepengurusan Anak Cabang';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detile-kepengurusan-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php 
        Modal::begin([
            'id'=>'modal-wilayah',
            'header' => '<h2>Hello world</h2>',
            'options'=>[
                'tabindex'=>false,
            ],

        ]);
    ?>
    <div class='modal-wilayah-body'></div>
    <?php Modal::end(); ?>

    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'panel'=>[
            'heading'=>'<center><b>'.$this->title.'</b></center>',
            'before'=>'<div class="col-md-6 pull-left">'.$this->render('_search', ['model' => $searchModel]).'</div>'.'<div class="pull-right">'.Html::button('<span class="fa fa-plus"></span>', ['value'=>Url::to(['/master/detile-kepengurusan/create']),'class' => 'btn btn-success button-tambah',]).'</div>',
        ],

        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',

            
            [
                'attribute'=>'id_anggota',
                'value'=>'idAnggota.nama_anggota',
                'hAlign'=>'center',
            ],
            [
                'attribute'=>'alamat',
                'value'=>'idAnggota.alamat_anggota',
                'hAlign'=>'center',
            ],
            [
                'attribute'=> 'jabatan',
                'hAlign'=>'center',
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end() ?>
</div>
<?php 

    $js = <<< JS
    $(document).on('click', '.button-tambah', function(e){
        e.preventDefault();

        $('#modal-wilayah').find('.modal-header').html('<center><h4>Tambah Pengurus</h4></center>');

        $('#modal-wilayah').modal('show').find('.modal-wilayah-body')
                    .load($(this).attr('value'));
    });
JS;
    $this->registerJs($js);


?>