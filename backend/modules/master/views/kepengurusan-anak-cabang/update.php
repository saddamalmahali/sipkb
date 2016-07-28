<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\master\models\KepengurusanAnakCabang */
?>
<div class="kepengurusan-anak-cabang-update">

    <?= $this->render('_form', [
        'model' => $model,
        'listAnakCabang'=>$listAnakCabang,
        'modelListAnggota'=>$modelListAnggota,
        'listAnggota'=>$listAnggota,
    ]) ?>

</div>
