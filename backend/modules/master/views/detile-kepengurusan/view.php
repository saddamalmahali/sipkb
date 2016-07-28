<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\master\models\DetileKepengurusan */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Detile Kepengurusans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detile-kepengurusan-view">
    <div class="panel panel-success">
        <div class="panel-heading"><?= Html::encode($this->title) ?></div>
        <div class="panel-body">
            <p>
                <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]) ?>
            </p>

            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    'id_kepengurusan',
                    'id_anggota',
                    'jabatan',
                ],
            ]) ?>
        </div>

    </div>
    <h1></h1>

    

</div>
