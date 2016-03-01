<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\master\models\Anggota */

$this->title = '.: Tambah Anggota :.';
$this->params['breadcrumbs'][] = ['label' => 'Daftar Anggota Terregistrasi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="anggota-create">
	
	<div class='container-fluid'>
		<div class='col-md-12'>
			<div class='panel panel-primary' >
				<div class='panel-heading'><center><b><?= Html::encode($this->title) ?></b></center></div>
				<div class='panel-body'>
					<?= $this->render('_form', [
						'model' => $model,
					]) ?>
				</div>
			</div>
		</div>
	</div>
	

</div>
