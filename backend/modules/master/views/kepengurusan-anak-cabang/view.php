<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\master\models\KepengurusanAnakCabang */
?>
<div class="kepengurusan-anak-cabang-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'id_anak_cabang',
            'periode',
            'no_sk',
            'tanggal_sk',
            'berlaku_sk',
            'file_sk',
        ],
    ]) ?>

</div>
