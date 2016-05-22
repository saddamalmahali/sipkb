<?php

use kartik\detail\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\master\models\AnakCabang */
?>
<div class="anak-cabang-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'kode_anak_cabang',
            'id_kelompok',
            'id_kecamatan',
            'nama',
            'keterangan',
            'foto_tempat',
            [
                'attribute'=>'aktif',
                'format'=>'raw',
                'value'=> $model->aktif == 1 ? '<span class="label label-success">Aktif</span>' : '<span class="label label-danger">tidak aktif</span>'
            ],
        ],
    ]) ?>

</div>
