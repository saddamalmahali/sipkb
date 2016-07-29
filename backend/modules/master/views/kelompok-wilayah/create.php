<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\master\models\KelompokWilayah */

$this->title = 'Tambah Kelompok Wilayah';
$this->params['breadcrumbs'][] = ['label' => 'Daftar Kelompok Wilayah', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kelompok-wilayah-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
