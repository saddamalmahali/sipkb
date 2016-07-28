<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\modules\master\models\KepengurusanDpc */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kepengurusan-dpc-form">

    <?php $form = ActiveForm::begin(); ?>
	<div class='col-md-6'>
	
		
		
		<?= $form->field($model, 'id_kepengurusan')->textInput(['maxlength' => true, 'placeholder'=>'ID Kepengurusan'])->label(false) ?>

		<?= $form->field($model, 'periode')->textInput(['maxlength' => true, 'placeholder'=>'Periode Kepengurusan'])->label(false) ?>

		<?= $form->field($model, 'tanggal_sk')->widget(DatePicker::classname(), [
			'value'=>date('yyyy-mm-dd', strtotime('+2 days')),
			'options'=>['placeholder'=>'Pilih Tanggal'],
			'pluginOptions'=>[
				'format'=>'yyyy-mm-dd',
				'autoclose'=>true,
				'todayHighlight'=>true
			]
		])->label(false) ?>
	</div>
	
	<div class='col-md-6'>
		<?= $form->field($model, 'berlaku_sk')->widget(DatePicker::classname(), [
			'value'=>date('yyyy-mm-dd', strtotime('+2 days')),
			'options'=>['placeholder'=>'Pilih Tanggal'],
			'pluginOptions'=>[
				'format'=>'yyyy-mm-dd',
				'autoclose'=>true,
				'todayHighlight'=>true
			]
		])->label(false) ?>

		<?= $form->field($model, 'keterangan')->textArea(['rows' => 3, 'placeholder'=>'Keterangan'])->label(false) ?>
	</div>

    

    

    <div class="modal-footer">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
