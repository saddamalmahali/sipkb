<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\master\models\KelompokWilayah */
?>
<div class="kelompok-wilayah-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_kelompok',
            'kode_kelompok',
            'nama_kelompok',
        ],
    ]) ?>

</div>
