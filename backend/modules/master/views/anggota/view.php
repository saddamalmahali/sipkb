<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\master\models\Anggota */
?>
<div class="anggota-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_anggota',
            //'id_kelompok',
            'nama_anggota',
            'jenis_kelamin',
            'tempat_lahir',
            'tanggal_lahir',
            'alamat_anggota',
            'kecamatan',
            'kabupaten',
            'no_ktp',
            'status',
        ],
    ]) ?>

</div>
