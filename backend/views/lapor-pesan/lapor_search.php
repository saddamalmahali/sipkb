<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;


/* @var $this yii\web\View */
/* @var $model app\modules\master\models\DetileKepengurusanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class='search-lapor-pesan'>
	<?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    
    <div class="col-md-8">
    	  
	    <div class="box">
            <div class='box-header with-border'>
                <center><h4 class='box-title'>Cari Berdasarkan Wilayah</h4></center>
                
                <div class="box-tools pull-right">
                    <button type="button" data-widget="collapse" class="btn btn-box-tool"><i class="fa fa-minus"></i></button>
                </div>
                    
            </div>
                
            <div class='box-body'>
                <div class='row'>
                    <div class="col-md-10">
                        <?= $form->field($model, 'wilayah')->widget(Select2::classname(),[
                            'data'=>$model->getWilayah(),
                            'options'=>['placeholder'=>'Pilih Kelompok Wilayah'],
                            'pluginOptions'=>[
                                'allowClear'=>true,
                            ]

                        ])->label(false) ?>

                    </div> 
                    <div class="col-md-2">
                        <?= Html::submitButton('<span class="fa fa-search"></span>', ['class' => 'btn btn-primary']) ?>
                    </div>     
                </div>
            </div>
        </div>
	    
    </div>        
	    
    <?php ActiveForm::end(); ?>

</div>