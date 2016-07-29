<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\master\models\KelompokWilayah */

$this->title = 'Update Kelompok Wilayah: ' . $model->id_kelompok;
$this->params['breadcrumbs'][] = ['label' => 'Daftar Kelompok Wilayah', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_kelompok, 'url' => ['view', 'id' => $model->id_kelompok]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kelompok-wilayah-update">
	
	<div class='row'>
		<div class='col-md-8'>
			<div class='box'>
				<div class='box-header'>
					<center>
						<h1 class='box-title'><?= Html::encode($this->title) ?></h1>
					</center>
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
