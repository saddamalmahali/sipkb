<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\master\models\DetileKepengurusan */

$this->title = 'Data Kepengurusan : #'.$model->id;
$this->params['breadcrumbs'][] = ['label' => 'Daftar Kepengurusan Anak Cabang', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detile-kepengurusan-view">
    <div class='row'>
		<div class='col-md-6'>
			<div class="box ">
				<div class="box-header">
					<center><h1 class='box-title'><?= Html::encode($this->title) ?></h1></center>
					
					<div class='box-tools pull-right'>
						<?= Html::a('<span class="fa fa-pencil"></span>', ['update', 'id' => $model->id], ['class' => 'btn btn-box-tool']) ?>
						<?= Html::a('<span class="fa fa-trash"></span>', ['delete', 'id' => $model->id], [
							'class' => 'btn btn-box-tool',
							'data' => [
								'confirm' => 'Are you sure you want to delete this item?',
								'method' => 'post',
							],
						]) ?>
					</div>
				</div>
				<div class="panel-body">
					<p>
						
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
		</div>
	</div>
    <h1></h1>

    

</div>
