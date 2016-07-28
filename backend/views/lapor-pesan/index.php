<?php
/* @var $this yii\web\View */


$this->title = "Lapor SMS";
use kartik\grid\GridView;
use yii\helpers\Html;
?>


	
<div class='row'>
	
	<?php echo  $this->render('lapor_search', ['model'=>$searchModel, 'list_wilayah', $list_wilayah])?>
	<div id='container-lapor' class='col-md-12'>


		<?= 
			GridView::widget([
				'dataProvider' => $dataProvider,
				'filterModel' => $searchModel,
				'pjax'=>true,
                'panelFooterTemplate'=> 
                    '<div class="kv-panel-pager">
                    <center>{pager}</center>
                    </div>
                    {footer}

                    <div class="clearfix"></div>
				', 
				'options'=>['class'=>'table-responsive'],
				'panel'=>[
					'heading'=>'<center><b>Daftar Laporan Pengurus</b></center>',
					'type'=>'primary',
					
					
				],
				
				
				'columns' => [
					['class' => 'kartik\grid\SerialColumn'],
					[
						'attribute'=>'tanggal',
						'label'=>'Tanggal Terima',
						'format'=>'date',
						'width'=>'15%',
                        'vAlign'=>'middle',
                        'hAlign'=>'center'
					],
					[
						'attribute'=>'anggotaDetile.idAnggota.idDetileKepengurusan.idKepengurusan.idAnakCabang.nama',
						'label'=>'Kelompok Wilayah',
						'width'=>'15%',
                        'vAlign'=>'middle',
                        'hAlign'=>'center'
					],
					[
						'attribute'=>'pengirim',
                        'value'=>function($model){
                            return $model->getNamaAnggota($model->pengirim);
                        },
						'label'=>'Pengirim',
						'width'=>'15%',
                        'vAlign'=>'middle',
                        'hAlign'=>'center'
					],
					[
						'attribute'=>'pesan',
						'width'=>'60%',
						'vAlign'=>'middle'
					],
					
				],
			]);
		?>
	</div>
	
	
	<div class="clearfix"></div>
</div>


<?php if (class_exists('backend\assets\AppAsset')) {
        backend\assets\ChartAsset::register($this);
    } else {
        app\assets\ChartAsset::register($this);
    } ?>
<?php 
	$url_last = Yii::$app->urlManager->hostInfo.Yii::$app->request->baseUrl.'/index.php/lapor-pesan/count';
	$chart = <<< JS
	
	
	var req = $.post({
		url : '{$url_last}',
        method : "POST",
        dataType : "json"		
	});
	
	req.success(function(data){
		var dapil = [];
		var laki = [];
		var perempuan = [];
		
		for(i=0; i<data.length; i++){
			dapil[i] = data[i].nama_kelompok;
			laki[i] = parseInt(data[i].jml_cowo);
			perempuan[i] = parseInt(data[i].jml_prp);
		}
		jml = [{
			name: 'Laki - Laki',
			data: laki			
		}];
		jml  = [{
			name: 'Perempuan',
			data: perempuan			
		}];
		
		$('#container-chart').highcharts({
			chart: {
				type: 'bar'
			},
			title: {
				text: 'Statistik Berdasarkan Daerah'
			},
			xAxis: {
				categories: dapil
			},
			yAxis: {
				title: {
					text: 'Banyak Laporan'
				}
			},
			series: [{
				name: 'Laki - Laki',
				data: laki
			}, {
				name: 'Perempuan',
				data: perempuan
			}]
		});
		console.log(jml);
		
	});
	
	
		
	
JS;
	$this->registerJs($chart);
?>
