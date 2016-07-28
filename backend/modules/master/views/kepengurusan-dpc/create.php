<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\master\models\KepengurusanDpc */

$this->title = 'Create Kepengurusan Dpc';
$this->params['breadcrumbs'][] = ['label' => 'Kepengurusan Dpcs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kepengurusan-dpc-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
