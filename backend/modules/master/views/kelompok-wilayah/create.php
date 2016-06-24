<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\master\models\KelompokWilayah */

$this->title = 'Create Kelompok Wilayah';
$this->params['breadcrumbs'][] = ['label' => 'Kelompok Wilayahs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kelompok-wilayah-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
