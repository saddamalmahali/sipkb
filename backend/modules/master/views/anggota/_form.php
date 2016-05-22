<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;

/* @var $this yii\web\View */
/* @var $model app\modules\master\models\Anggota */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="anggota-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'id_kelompok')->textInput() ?>

            <?= $form->field($model, 'nama_anggota')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'jenis_kelamin')->dropDownList([ 'laki-laki' => 'Laki-laki', 'perempuan' => 'Perempuan', ], ['prompt' => '']) ?>

            <?= $form->field($model, 'tempat_lahir')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'tanggal_lahir')->textInput() ?>
        </div>
        <div class="col-md-6">            

            <?= $form->field($model, 'kabupaten')->textInput(['maxlength' => true]) ?>

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
    

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
