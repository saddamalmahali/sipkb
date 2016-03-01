<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\master\models\Anggota */

$this->title = 'Update Anggota: ' . ' ' . $model->id_anggota;
$this->params['breadcrumbs'][] = ['label' => 'Daftar Anggota Terregistrasi', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_anggota, 'url' => ['view', 'id' => $model->id_anggota]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="anggota-update">
	
	<div class='container-fluid'>
		<div class='col-md-12'>
			<div class='panel panel-primary'>
				<div class='panel-heading'><center><?= Html::encode($this->title) ?></center></div>
				<div class='panel-body'>
					<?= $this->render('_form', [
						'model' => $model,
					]) ?>
				</div>
			</div>
		</div>
	</div>
	

    

</div>
