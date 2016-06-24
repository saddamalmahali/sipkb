<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\master\models\DetileKepengurusan */

$this->title = 'Tambah Pengurus';
$this->params['breadcrumbs'][] = ['label' => 'Detile Kepengurusans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detile-kepengurusan-create">


    <?= $this->render('_form', [
        'model' => $model,
        'listPac'=>$listPac,
        'listAnggota'=>$listAnggota,
    ]) ?>

</div>
