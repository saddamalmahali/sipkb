<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Inbox */

$this->title = $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Inboxes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inbox-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ID], [
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
            'UpdatedInDB',
            'ReceivingDateTime',
            'Text:ntext',
            'SenderNumber',
            'Coding',
            'UDH:ntext',
            'SMSCNumber',
            'Class',
            'TextDecoded:ntext',
            'ID',
            'RecipientID:ntext',
            'Processed',
        ],
    ]) ?>

</div>
