<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\master\models\AnakCabang */
?>
<div class="anak-cabang-update">

    <?= $this->render('_form', [
        'model' => $model,
        'listKelompokWilayah'=>$listKelompokWilayah,
        'listKecamatan'=>$listKecamatan,
    ]) ?>

</div>
