<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\master\models\KelompokWilayahSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kelompok Wilayahs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kelompok-wilayah-index">
    <?php 
        Modal::begin([
            'id'=>'modal-wilayah',
            'header' => '<h2>Hello world</h2>',
        ]);
    ?>
    <div class='modal-wilayah-body'></div>
    <?php Modal::end(); ?>

  
            <?= GridView::widget([
                'pjax'=>true,
                'pjaxSettings'=>[
                    'options'=>[
                        'id'=>'grid-kelompok-wilayah',
                    ],
                ],
                'panel'=>[
                    'type'=>'success',
                    'heading'=>$this->title,
                    'before'=> '<div class="pull-right">'.Html::button('<span class="fa fa-plus"></span>', ['value'=>Url::to('./kelompok-wilayah/create'),'class' => 'btn btn-success button-tambah',]).'</div>',
                ],
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    //'id_kelompok',
                    [
                        'attribute'=>'kode_kelompok',
                        'hAlign'=>'center'

                    ],
                    [
                        'attribute'=>'nama_kelompok',
                        'hAlign'=>'center'

                    ],

                    [
                        'class' => 'kartik\grid\ActionColumn',
                        'hAlign'=> 'center'
                    ],
                ],
            ]); ?>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    
    
</div>

<?php 

    $js = <<< JS
    $(document).on('click', '.button-tambah', function(e){
        e.preventDefault();
        $('#modal-wilayah').find('.modal-header').html('<center><h4>Tambah Kelompok Wilayah</h4></center>');
        $('#modal-wilayah').modal('show').find('.modal-wilayah-body')
                    .load($(this).attr('value'));
    });
JS;
    $this->registerJs($js);


?>
