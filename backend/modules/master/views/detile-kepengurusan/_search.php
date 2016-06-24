<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\modules\master\models\DetileKepengurusanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="detile-kepengurusan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    
    <div class="col-md-8">
        <?= $form->field($model, 'id_kepengurusan')->label(false) ?>        
    </div>
    <div class="col-md-4">
        <?= Html::submitButton('<span class="fa fa-search"></span>', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>
    

    
    
    

    <?php ActiveForm::end(); ?>

</div>
