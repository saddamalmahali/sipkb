<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\master\models\DetileKepengurusan */
?>
<div class="detile-kepengurusan-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'id_kepengurusan',
            'id_anggota',
        ],
    ]) ?>

</div>
