<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\master\models\AnakCabang */

?>
<div class="anak-cabang-create">
    <?= $this->render('_form', [
        'model' => $model,
        'listKelompokWilayah'=>$listKelompokWilayah,
        'listKecamatan'=>$listKecamatan,
    ]) ?>
</div>
