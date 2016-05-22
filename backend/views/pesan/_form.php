<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Inbox */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inbox-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'UpdatedInDB')->textInput() ?>

    <?= $form->field($model, 'ReceivingDateTime')->textInput() ?>

    <?= $form->field($model, 'Text')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'SenderNumber')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Coding')->dropDownList([ 'Default_No_Compression' => 'Default No Compression', 'Unicode_No_Compression' => 'Unicode No Compression', '8bit' => '8bit', 'Default_Compression' => 'Default Compression', 'Unicode_Compression' => 'Unicode Compression', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'UDH')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'SMSCNumber')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Class')->textInput() ?>

    <?= $form->field($model, 'TextDecoded')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'RecipientID')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Processed')->dropDownList([ 'false' => 'False', 'true' => 'True', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
