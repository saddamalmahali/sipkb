<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\InboxSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inbox-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'UpdatedInDB') ?>

    <?= $form->field($model, 'ReceivingDateTime') ?>

    <?= $form->field($model, 'Text') ?>

    <?= $form->field($model, 'SenderNumber') ?>

    <?= $form->field($model, 'Coding') ?>

    <?php // echo $form->field($model, 'UDH') ?>

    <?php // echo $form->field($model, 'SMSCNumber') ?>

    <?php // echo $form->field($model, 'Class') ?>

    <?php // echo $form->field($model, 'TextDecoded') ?>

    <?php // echo $form->field($model, 'ID') ?>

    <?php // echo $form->field($model, 'RecipientID') ?>

    <?php // echo $form->field($model, 'Processed') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
