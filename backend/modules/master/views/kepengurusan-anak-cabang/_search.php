<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\master\models\KepengurusanAnakCabangSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kepengurusan-anak-cabang-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_anak_cabang') ?>

    <?= $form->field($model, 'periode') ?>

    <?= $form->field($model, 'no_sk') ?>

    <?= $form->field($model, 'tanggal_sk') ?>

    <?php // echo $form->field($model, 'berlaku_sk') ?>

    <?php // echo $form->field($model, 'file_sk') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
