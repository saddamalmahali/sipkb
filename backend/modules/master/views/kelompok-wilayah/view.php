<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\master\models\KelompokWilayah */

$this->title = 'Data Kelompok Wilayah #'.$model->id_kelompok;
$this->params['breadcrumbs'][] = ['label' => 'Daftar Kelompok Wilayah', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kelompok-wilayah-view">
	<div class='row'>
		<div class='col-md-8'>
			<div class='box'>
				<div class='box-header with-border'>
					<center><h1 class='box-title'><?= Html::encode($this->title) ?></h1></center>
					
					<div class='box-tools pull-right'>
						<?= Html::a('<span class="fa fa-pencil"></span>', ['update', 'id' => $model->id_kelompok], ['class' => 'btn btn-box-tool']) ?>
						<?= Html::a('<span class="fa fa-trash"></span>', ['delete', 'id' => $model->id_kelompok], [
							'class' => 'btn btn-box-tool',
							'data' => [
								'confirm' => 'Are you sure you want to delete this item?',
								'method' => 'post',
							],
						]) ?>
					</div>
				</div>
				<div class='box-body'>
					<p>
					
					</p>

					<?= DetailView::widget([
						'model' => $model,
						'attributes' => [
							//'id_kelompok',
							'kode_kelompok',
							'nama_kelompok',
						],
					]) ?>
				</div>
			</div>
		</div>
	</div>
    

    

</div>
