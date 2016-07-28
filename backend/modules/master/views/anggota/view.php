<?php

use kartik\detail\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\master\models\Anggota */
?>
<div class="anggota-view">
	
	<?php
		
		$url = Yii::$app->urlManager->hostInfo.Yii::$app->request->baseUrl;
		
		
		
	?>
	
	<div class='col-md-4'>
		<?php 
			if($model->foto != null || $model->foto != ''){
				echo '<img class="img-responsive img-thumbnail" src='.$url.'/'.$model->foto.'></img>'; 
			}else{
				echo '<img class="img-responsive img-thumbnail" src='.$url.'/file-upload/f3.png></img>'; 
			}
			
			
		?>
	</div>
	
	<div class='col-md-8'>
		<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
		  <div class="panel panel-default">
			<div class="panel-heading" role="tab" id="DetileAnggota">
			  <h4 class="panel-title">
				<a role="button" data-toggle="collapse" data-parent="#accordion" href="#dataDetileAnggota" aria-expanded="true" aria-controls="dataDetileAnggota">
				  <span class="fa fa-user"></span>&nbsp;&nbsp;<b>Detile Data Anggota</b>
				</a>
			  </h4>
			</div>
			<div id="dataDetileAnggota" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="DetileAnggota">
			  <div class="panel-body">
				<?= DetailView::widget([
					'model' => $model,
					
					'attributes' => [
						//'id_anggota',
						//'id_kelompok',
						'nama_anggota',
						'jenis_kelamin',
						'tempat_lahir',
						'tanggal_lahir',
						'alamat_anggota',
						[
							'attribute'=>'kecamatan',
							'format'=>'text',
							'value'=>$model->getKecamatan($model->kecamatan),
							'labelColOptions'=>[
								'style'=>'width:30%; text-align:right',
							]
						],
						//'kecamatan',
						//'kabupaten',
						'no_ktp',
						[
							'attribute'=>'status',
							'format'=>'raw',
							'value'=> $model->status ? '<span class="label label-success">Aktif</span>' : '<span class="label label-danger">Tidak Aktif</span>'
						],
						
					],
				]) ?>
			  </div>
			</div>
		  </div>
		  <div class="panel panel-default">
			<div class="panel-heading" role="tab" id="headingTwo">
			  <h4 class="panel-title">
				<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
				  <span class="fa fa-book"></span>&nbsp;&nbsp;<b>Detile Kontak</b>
				</a>
			  </h4>
			</div>
			<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
			  <div class="panel-body">
				<?= DetailView::widget([
					'model' => $detile_kontak,
					
					'attributes' => [
						//'id_anggota',
						//'id_kelompok',
						[
							'attribute'=>'email',
							'value'=>$detile_kontak->email != null ? $detile_kontak->email : "Kosong"
						],
						'no_hp',
						[
							'attribute'=>'no_rumah',
							'value'=>is_null($detile_kontak->no_rumah) ? "kosong" : $detile_kontak->no_rumah
						],
						
						
					],
				]) ?>
			  </div>
			</div>
		  </div>
		  <div class="panel panel-default">
			<div class="panel-heading" role="tab" id="headingThree">
			  <h4 class="panel-title">
				<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
				  <span class="fa fa-map"></span>&nbsp;&nbsp;<b>Penempatan Wilayah</b>
				</a>
			  </h4>
			</div>
			<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
			  <div class="panel-body">
				Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
			  </div>
			</div>
		  </div>
		</div>
		
	</div>
    
	<div class='clearfix'></div>
</div>
