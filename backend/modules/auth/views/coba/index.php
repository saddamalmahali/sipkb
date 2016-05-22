<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\auth\models\CobaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cobas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="coba-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Coba', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'judul',
            'isi',
            'keterangan',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
