<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel common\models\InboxSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Manajemen Perpesanan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pesan-index">        
    <div class='container-fluid'>
        <div class="col-md-12">        

            <div class='panel panel-success'>
                <div class="panel-heading"><?= Html::encode($this->title) ?></div>   
                <div class='panel-body'>
                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                    <p>
                        <?= Html::a('<span class="glyphicon glyphicon-envelope"></span>  Tulis Pesan', ['tulis-pesan'], ['class' => 'btn btn-success']) ?>
                        <?= Html::button('Tulis Pesan', [ 'id'=>'tombol_tambah',
                            'class' => 'btn btn-success btn-ajax-modal',
                            'value' => Url::to('index.php?r=pesan/tulis-pesan'),
                        ]); ?>
                    </p>

                    <?php 
                            Modal::begin([
                                'id' => 'modal_tambah',
                                'header' => '<h4>Tulis Pesan</h4>',
                            ]);
                            echo '<div class="modal-content"></div>';
                            Modal::end();
                        ?>
                    <?php Pjax::begin(); ?>
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'options'=>['class'=>'table-responsive'],
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

                            //'UpdatedInDB',
                            [
                                'attribute'=>'SenderNumber',
                                'label'=>'Pengirim'
                            ],
                            [
                                'attribute'=>'TextDecoded',
                                'label'=>'Isi Pesan',
                                'options'=>[
                                        'width'=>'30%',
                                        'row'=>'6',
                                ],
                            ],
                            [
                                'attribute'=>'ReceivingDateTime',
                                'label'=>'Tanggal Diterima'
                            ],
                            //'Text:ntext',
                            //'SenderNumber',
                            //'Coding',
                            // 'UDH:ntext',
                            // 'SMSCNumber',
                            // 'Class',
                            
                            
                            // 'ID',
                            // 'RecipientID:ntext',
                            // 'Processed',

                            ['class' => 'yii\grid\ActionColumn'],
                        ],
                    ]); ?>

                    <?php Pjax::end();?>
                </div>         
            </div>

        </div>

    </div>
</div>
    
    <h1></h1>
    <?php $this->registerJs(
    '
        
            $("#tombol_tambah").click(function(){
                $("#modal_tambah").modal("show")
                .find(".modal-content")
                .load($(this).attr("value"));           
            });
        
        

    ');
    ?>

</div>
