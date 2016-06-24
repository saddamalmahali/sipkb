<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\master\models\Anggota */
?>
<div class="anggota-update">

    <?= $this->render('_form_update', [
        'model' => $model,
        'listKecamatan'=>$listKecamatan,
        'detile_kontak'=>$detile_kontak,
        'detile_kepengurusan'=>$detile_kepengurusan,
        'listPac'=>$listPac,
        'listAnggota'=>$listAnggota,
        'listKep'=>$listKep,
    ]) ?>

</div>
