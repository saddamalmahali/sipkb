<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use kartik\widgets\DatePicker;
use yii\bootstrap\Tabs;
use kartik\widgets\DepDrop;
use kartik\widgets\FileInput;
use yii\helpers\Url;
use yii\web\View;
use app\modules\master\models\Anggota;

/* @var $this yii\web\View */
/* @var $model app\modules\master\models\Anggota */
/* @var $form yii\widgets\ActiveForm */

$tingkatKepengurusan = Html::getInputName($model, 'tingkatKepengurusanOptions');

$scriptTingkat = <<< JS
	
	$('.tingkat-kepengurusan-pac').hide();
	
	\$("[name='{$tingkatKepengurusan}']").change(function(evt){
		var val = \$(this).val();		
		if(val == 1){
			$('.tingkat-kepengurusan-dpc').show();
			$('.tingkat-kepengurusan-pac').hide();
		}else if(val ==2){
			$('.tingkat-kepengurusan-pac').show();
			$('.tingkat-kepengurusan-dpc').hide();
		}else if(val == 3){
			$('.tingkat-kepengurusan-pac').hide();
			$('.tingkat-kepengurusan-dpc').hide();
		}
		console.log(val);
	});
JS;

$this->registerJs($scriptTingkat, View::POS_END, 'tingkat-kepengurusan-js');
?>

<div class="anggota-form">
    <?php $form = ActiveForm::begin([
        'id' => 'anggota-form',
		'options'=>[
			'enctype'=>'multipart/form-data'
		]
    ]); ?>
    <div class='row'>
		<div class='col-md-8'>
			<ul class="nav nav-tabs inverse" role="tablist">
				<li role="presentation" class="active"><a href="#data-umum" aria-controls="data-umum" role="tab" data-toggle="tab"><span class="fa fa-bars"></span>&nbsp;&nbsp;&nbsp;Data Umum</a></li>
				<li role="presentation"><a href="#kontak" aria-controls="kontak" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-modal-window"></span>&nbsp;&nbsp;&nbsp;Kontak</a></li>
				<li role="presentation"><a href="#wilayah" aria-controls="wilayah" role="tab" data-toggle="tab"><span class="fa fa-map-marker"></span>&nbsp;&nbsp;&nbsp;Penempatan Wilayah</a></li>
				
			  </ul>

			  <!-- Tab panes -->
			  <div class="tab-content">
				<div role="tabpanel" class="tab-pane active" id="data-umum">
					<div class="row" style='padding-top:10px;'>
						<div class="col-md-6">
							

							<?= $form->field($model, 'nama_anggota')->textInput(['maxlength' => true]) ?>

							<?= $form->field($model, 'jenis_kelamin')->dropDownList([ 'laki-laki' => 'Laki-laki', 'perempuan' => 'Perempuan', ], ['prompt' => '']) ?>

							<?= $form->field($model, 'tempat_lahir')->textInput(['maxlength' => true]) ?>

							<?= $form->field($model, 'tanggal_lahir')->widget(DatePicker::classname(), [
								'value'=>date('yyyy-mm-dd', strtotime('+2 days')),
								'options'=>['placeholder'=>'Pilih Tanggal'],
								'pluginOptions'=>[
									'format'=>'yyyy-mm-dd',
									'autoclose'=>true,
									'todayHighlight'=>true
								]
							]) ?>
						</div>
						<div class="col-md-6">            

							<?= $form->field($model, 'no_ktp')->textInput(['maxlength' => true]) ?>

							<?= $form->field($model, 'kecamatan')->widget(Select2::classname(), [
								'data'=>$listKecamatan,
								'options'=>[
									'placeholder'=> 'Pilih Kecamatan'
								],
								'pluginOptions'=>[
									'allowClear'=>true
								]
							]) ?>

							<?= $form->field($model, 'alamat_anggota')->textArea(['rows'=>5]) ?>
						</div>
					</div>
				</div>
				<div role="tabpanel" class="tab-pane" id="kontak">
					<div class="col-md-12">
						<?= $form->field($detile_kontak, 'no_hp')->textInput(['maxlength'=>true]) ?>
						<?= $form->field($detile_kontak, 'email')->textInput(['maxlength'=>true]) ?>
						<?= $form->field($detile_kontak, 'no_rumah')->textInput(['maxlength'=>true]) ?>                
					</div>            
				</div>
				<div role="tabpanel" class="tab-pane" id="wilayah">
				
					<?= $form->field($model, 'tingkatKepengurusanOptions')->radioList($model->getTingkatKepengurusanOptions(), [
						'separator' => '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',
						'validateOnChange' => false
					]) ?>
					
					
					
					<div class='tingkat-kepengurusan-pac'>
						
						<?= $form->field($detile_kepengurusan, 'pac')->widget(Select2::classname(), [
						
							'data'=>$listPac,
							'options'=>['placeholder'=>'Pilih PAC', 'id'=>'pac-id'],
							'pluginOptions'=>[
								'allowClear'=>true,
							]
						]) ?>

						<?= $form->field($detile_kepengurusan, 'id_kepengurusan')->widget(DepDrop::classname(), [
							'options'=>['id'=>'kepengurusan-id'],
							'pluginOptions'=>[
								'depends'=>['pac-id'],
								'placeholder'=>'Pilih Masa Kepengurusan',
								'url'=>Url::to(['/master/detile-kepengurusan/kepengurusan'])
							]
						]); ?>

						

						<?= $form->field($detile_kepengurusan, 'jabatan')->textInput(['maxlength' => true]) ?>
					</div>
					
					<div class='tingkat-kepengurusan-dpc'>
						
						<?= $form->field($detile_kepengurusan_dpc, 'id_kepengurusan')->widget(Select2::classname(), [
						
							'data'=>$listKepengurusanDpc,
							'options'=>['placeholder'=>'Pilih Kepengurusan'],
							'pluginOptions'=>[
								'allowClear'=>true,
							]
						]) ?>


						

						<?= $form->field($detile_kepengurusan_dpc, 'jabatan')->textInput(['maxlength' => true]) ?>
					</div>
					
					
					
				</div>
				
			  </div>
		</div>
		<div class='col-md-4'>
			<?= $form->field($model, 'file')->widget(FileInput::classname(), [
				'name' => 'attachments', 
				'options' => ['multiple' => true, 'placeholder'=>"Pilih Foto"], 
				'pluginOptions' => [
				
					'previewFileType' => 'jpg',
					'showCaption' => true,
					'showRemove' => false,
					'showUpload' => false,
					
				]
			])->label(false) ?>
		</div>
	
      <!-- Nav tabs -->
      

    </div>

    
    

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>

