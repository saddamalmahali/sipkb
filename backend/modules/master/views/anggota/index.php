<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\master\models\AnggotaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Anggota Terregistrasi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="anggota-index">
	<div class='container-fluid'>
		<div class='col-md-12'>
			<div class='panel panel-success'>
				<div class='panel-heading'><?= Html::encode($this->title) ?></div>
				<div class='panel-body'>
					<p>
						<?= Html::a('Create Anggota', ['create'], ['class' => 'btn btn-success']) ?>
					</p>

					<?= GridView::widget([
						'dataProvider' => $dataProvider,
						'filterModel' => $searchModel,
						'columns' => [
							['class' => 'yii\grid\SerialColumn'],

							//'id_anggota',
							'nama_anggota',
							'jenis_kelamin',
							'tempat_lahir',
							'tanggal_lahir',
							'alamat_anggota',
							// 'kecamatan',
							// 'kabupaten',
							// 'no_ktp',

							['class' => 'yii\grid\ActionColumn'],
						],
					]); ?>
				</div>
			</div>
		</div>
	</div>
    <h1></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    

</div>
