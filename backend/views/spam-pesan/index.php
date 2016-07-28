<?php
/* @var $this yii\web\View */


$this->title = "Pesan SPAM";
use kartik\grid\GridView;
use yii\helpers\Html;
?>

<?= 
	GridView::widget([
		'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
		'pjax'=>true,
		'options'=>['class'=>'table-responsive'],
		'panelFooterTemplate'=> 
				'<div class="kv-panel-pager">
				<center>{pager}</center>
				</div>
				{footer}
				
				<div class="clearfix"></div>
				', 
		'panel'=>[
			'heading'=>'Daftar Pesan SPAM',
			'type'=>'success'
			
		],
		'toolbar'=>[
			'content'=>Html::a('<i class="glyphicon glyphicon-repeat"></i>', [''],
                    ['data-pjax'=>1, 'class'=>'btn btn-default', 'title'=>'Segarkan'])
		],
		
		'columns' => [
			['class' => 'kartik\grid\SerialColumn'],
			[
				'attribute'=>'tanggal',
				'label'=>'Tanggal Terima',
				'width'=>'15%'
			],
			[
				'attribute'=>'pengirim',
				'label'=>'Pengirim',
				'width'=>'15%'
			],
			[
				'attribute'=>'pesan',
				'width'=>'60%',
				'vAlign'=>'middle'
			],
		],
	]);
?>
