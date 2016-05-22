<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use kartik\widgets\Select2;

/* @var $this yii\web\View */
/* @var $model app\modules\master\models\AnakCabang */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="anak-cabang-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class='row'>
        <div class='col-md-6'>
            <?= $form->field($model, 'kode_anak_cabang')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'id_kelompok')->widget(Select2::classname(), [
                'data'=>$listKelompokWilayah,
                'options'=>['placeholder'=>'Pilih Kelompok Wilayah'],
                'pluginLoading'=>true,
                'pluginOptions'=>[
                    'allowClear'=>true
                ]
            ]) ?>

            <?= $form->field($model, 'id_kecamatan')->widget(Select2::classname(), [
                'data'=>$listKecamatan,
                'options'=>['placeholder'=>'Pilih Kecamatan'],
                'pluginLoading'=>true,
                'pluginOptions'=>[
                    'allowClear'=>true,
                ]
            ]) ?>

            <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'keterangan')->textArea(['rows' => 6]) ?>           

            <?= $form->field($model, 'filefoto')->fileInput() ?>

            <?= $form->field($model, 'aktif')->checkbox() ?>
        </div>        
    </div>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
