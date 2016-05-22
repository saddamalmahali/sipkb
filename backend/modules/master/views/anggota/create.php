<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\master\models\Anggota */

?>
<div class="anggota-create">
    <?= $this->render('_form', [
        'model' => $model,
        'listKecamatan'=>$listKecamatan,
    ]) ?>
</div>
