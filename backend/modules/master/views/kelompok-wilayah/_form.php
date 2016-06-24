<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\modules\master\models\KelompokWilayah */
/* @var $form yii\widgets\ActiveForm */
?>

    <?php $form = ActiveForm::begin([
    	'id'=>$model->formName(),
    	'enableAjaxValidation'=>true,
    	'validationUrl'=>Url::toRoute('kelompok-wilayah/cek')
    ]); ?>

    <?= $form->field($model, 'kode_kelompok')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_kelompok')->textInput(['maxlength' => true]) ?>

    <div class="modal-footer">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>


<?php 
	$js = <<< JS
		$('form#{$model->formName()}').on('beforeSubmit', function(e){
			var \$form = $(this);

			$.post(
				\$form.attr("action"), 
				\$form.serialize()
			).done(function(result){
				if(result == 1){
					$(document).find('#modal-wilayah').modal('hide');
					$(\$form).trigger("reset");
					$.pjax.reload({container : "#grid-kelompok-wilayah"});
				}else{
					$("#message").html(result);
				}
			}).fail(function(e){
				console.log("some severe erroe");
			});

			return false;
		})
JS;

	$this->registerJs($js);
?>
