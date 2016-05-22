<?php


use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Alert;

$this->title = 'Tulis Pesan';
$this->params['breadcrumbs'][] = ['label' => 'Manajemen Perpesanan', 'url' => ['index']];

?>

<div class="inbox-form">
	<?php if (Yii::$app->session->hasFlash('success')): ?>
    <?= Alert::widget([
        'options' => [
            'class' => 'alert-info'
        ],
        'body' => Yii::$app->session->getFlash('success')
    ]) ?>
    <?php endif; ?>


		<div class="panel panel-primary">
			<div class="panel-heading"><?= $this->title ?></div>
			<div class="panel-body">
				<?php $form = ActiveForm::begin(); ?>
					<?= $form->field($model, 'number')->textInput(); ?>
					<?= $form->field($model, 'text')->textInput(); ?>
					<div class="form-group">
				        <?= Html::submitButton('Kirim', ['class' => 'btn btn-primary']) ?>
				    </div>
				<?php ActiveForm::end();	?>				
			</div>
			

		</div>
</div>