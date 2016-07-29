<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\master\models\KepengurusanDpc */

$this->title = 'Data Pengurus DPC : #'.$model->id;
$this->params['breadcrumbs'][] = ['label' => 'Daftar Kepengurusan DPC', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kepengurusan-dpc-view">
	<div class='row'>
		<div class='col-md-6'>
			<div class='box'>
				<div class='box-header'>
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
				<div class='box-body'>
					<?= DetailView::widget([
						'model' => $model,
						'attributes' => [
							'id',
							'id_kepengurusan',
							'periode',
							'tanggal_sk',
							'berlaku_sk',
							'keterangan',
						],
					]) ?>
				</div>				
			</div>
		</div>
	</div>

    

    <p>
        
    </p>

    

</div>
