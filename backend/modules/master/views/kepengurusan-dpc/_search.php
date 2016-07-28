<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\master\models\KepengurusanDpcSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kepengurusan-dpc-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_kepengurusan') ?>

    <?= $form->field($model, 'periode') ?>

    <?= $form->field($model, 'tanggal_sk') ?>

    <?= $form->field($model, 'berlaku_sk') ?>

    <?php // echo $form->field($model, 'keterangan') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
