<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\master\models\KepengurusanDpcSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Kepengurusan DPC';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kepengurusan-dpc-index">

	<?php 
        Modal::begin([
            'id'=>'modal-kepengurusan-dpc',
            'header' => '<h2>Hello world</h2>',
        ]);
    ?>
    <div class='modal-kepengurusan-dpc-body'></div>
    <?php Modal::end(); ?>
	
	<div class='row'>
		<div class='col-md-12'>
			<div class='box'>
				<div class='box-header with-border'>
					<center><h3><?= Html::encode($this->title) ?></h3></center>
				</div>
				<div class='box-body'>
					<div class='row'>
						<div class='col-md-12'>
							<?= Html::button('<span class="fa fa-plus"></span> &nbsp; Tambah ', ['value'=>Url::to('./kepengurusan-dpc/create'),'class' => 'btn btn-success button-tambah pull-right',]) ?>
						</div>
					</div>
					
					<br />
					 <?= GridView::widget([
						'dataProvider' => $dataProvider,
						'filterModel' => $searchModel,
						
						'columns' => [
							['class' => 'yii\grid\SerialColumn'],

							//'id',
							[
								'attribute'=>'id_kepengurusan',
								'hAlign'=>'center'
							],
							[
								'attribute'=>'periode',
								'hAlign'=>'center'
							],
							[
								'attribute'=>'tanggal_sk',
								'hAlign'=>'center'
							],
							[
								'attribute'=>'berlaku_sk',
								'hAlign'=>'center'
							],
							
							// 'keterangan',

							['class' => 'yii\grid\ActionColumn'],
						],
					]); ?>
				</div>				
			</div>
		</div>
	</div>
    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

   
</div>
<?php 

    $js = <<< JS
    $(document).on('click', '.button-tambah', function(e){
        e.preventDefault();
		
		$('#modal-kepengurusan-dpc').find('.modal-header').html('<center><h3>Tambah Kepengurusan</h3></center>');
		
        $('#modal-kepengurusan-dpc').modal('show').find('.modal-kepengurusan-dpc-body')
                    .load($(this).attr('value'));
    });
JS;
    $this->registerJs($js);


?>
