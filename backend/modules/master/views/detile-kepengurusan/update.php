<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\master\models\DetileKepengurusan */

$this->title = 'Update Detile Kepengurusan: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Daftar Kepengurusan Anak Cabang', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Data Kepengurusan : #'.$model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="detile-kepengurusan-update">

    
	<div class="row">
		<div class="col-md-6">
			<div class='box'>
				<div class="box-header with-border">
					<center><b><h1 class="box-title"><?= Html::encode($this->title) ?></h1></b></center>
				</div>
				<div class="box-body">
					<?= $this->render('_form', [
						'model' => $model,
						'listPac'=>$listPac,
						'listAnggota'=>$listAnggota,
					]) ?>
				</div>
			</div>
		</div>
	</div>
    

</div>
