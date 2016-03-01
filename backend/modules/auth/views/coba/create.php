<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\auth\models\Coba */

$this->title = 'Create Coba';
$this->params['breadcrumbs'][] = ['label' => 'Cobas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="coba-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
