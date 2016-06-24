<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\master\models\KelompokWilayah */

$this->title = 'Update Kelompok Wilayah: ' . $model->id_kelompok;
$this->params['breadcrumbs'][] = ['label' => 'Kelompok Wilayahs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_kelompok, 'url' => ['view', 'id' => $model->id_kelompok]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kelompok-wilayah-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
