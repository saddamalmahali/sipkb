<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\master\models\KepengurusanDpc */

$this->title = 'Update Kepengurusan Dpc: #' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Daftar Kepengurusan DPC', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kepengurusan-dpc-update">
	<div class='row'>
		<div class='col-md-6'>
			<div class='box'>
				<div class='box-header'>
					<center><h1 class='box-title'><?= Html::encode($this->title) ?></h1></center>
				</div>
				<div class='box-body'>
					<?= $this->render('_form', [
						'model' => $model,
					]) ?>
				</div>
			</div>
		</div>
	</div>
    

    

</div>
