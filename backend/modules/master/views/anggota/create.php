<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\master\models\Anggota */

?>
<div class="anggota-create">
    <?= $this->render('_form', [
        'model' => $model,
        'listKecamatan'=>$listKecamatan,
        'detile_kontak'=>$detile_kontak,
        'detile_kepengurusan'=>$detile_kepengurusan,
        'listPac'=>$listPac,
        'listAnggota'=>$listAnggota,
		'detile_kepengurusan_dpc'=>$detile_kepengurusan_dpc,
		'listKepengurusanDpc'=>$listKepengurusanDpc,
    ]) ?>
</div>
