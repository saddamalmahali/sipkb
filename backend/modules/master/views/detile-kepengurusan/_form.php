<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use kartik\widgets\DepDrop;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\modules\master\models\DetileKepengurusan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="detile-kepengurusan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pac')->widget(Select2::classname(), [
    	
    	'data'=>$listPac,
    	'options'=>['placeholder'=>'Pilih PAC', 'id'=>'pac-id'],
    	'pluginOptions'=>[
    		'allowClear'=>true,
    	]
    ]) ?>

    <?= $form->field($model, 'id_kepengurusan')->widget(DepDrop::classname(), [
	    'options'=>['id'=>'kepengurusan-id'],
	    'pluginOptions'=>[
	        'depends'=>['pac-id'],
	        'placeholder'=>'Pilih Masa Kepengurusan',
	        'url'=>Url::to(['/master/detile-kepengurusan/kepengurusan'])
	    ]
	]); ?>

    <?= $form->field($model, 'id_anggota')->widget(Select2::classname(), [
    	'data'=>$listAnggota, 
    	'options'=>['placeholder'=>'Pilih Anggota'],
    	'pluginOptions'=>[
    		'allowClear'=>true,
    	]
    ]) ?>

    <?= $form->field($model, 'jabatan')->textInput(['maxlength' => true]) ?>

    <div class="modal-footer">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
