<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use kartik\widgets\DatePicker;
use wbraganca\dynamicform\DynamicFormWidget;

/* @var $this yii\web\View */
/* @var $model app\modules\master\models\KepengurusanAnakCabang */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kepengurusan-anak-cabang-form">

    <?php $form = ActiveForm::begin(['id'=>'dynamic-form']); ?>

    <?= $form->field($model, 'id_anak_cabang')->widget(Select2::classname(), [
        'data'=>$listAnakCabang,
        'options'=>['placeholder'=>'Pilih Anak Cabang'],
        'pluginOptions'=>[
            'autoClose'=>true
        ]
    ]) ?>

    <?= $form->field($model, 'periode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_sk')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tanggal_sk')->widget(DatePicker::classname(),[
        'type' => DatePicker::TYPE_COMPONENT_APPEND,
        'value' => date('yyyy-mm-dd', strtotime('+2 days')),
        'options' => ['placeholder' => 'Pilih Tanggal'],
        'pluginOptions' => [
            'format' => 'yyyy-mm-dd',
            'todayHighlight' => true,
            'autoclose'=>true

        ]
    ]) ?>

    <?= $form->field($model, 'berlaku_sk')->widget(DatePicker::classname(),[
        'type' => DatePicker::TYPE_COMPONENT_APPEND,
        'value' => date('yyyy-mm-dd', strtotime('+2 days')),
        'options' => ['placeholder' => 'Pilih Tanggal'],
        'pluginOptions' => [
            'format' => 'yyyy-mm-dd',
            'todayHighlight' => true,
            'autoclose'=>true

        ]
    ]) ?>

    <?= $form->field($model, 'foto')->fileInput() ?>

    <?php DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items', // required: css class selector
                'widgetItem' => '.item', // required: css class
                'limit' => 4, // the maximum times, an element can be cloned (default 999)
                'min' => 1, // 0 or 1 (default 1)
                'insertButton' => '.add-item', // css class
                'deleteButton' => '.remove-item', // css class
                'model' => $modelListAnggota[0],
                'formId' => 'dynamic-form',
                'formFields' => [
                    'nama_barang',
                    'kuantitas',
                    'harga',
                    
                ],
            ]); ?>
        <?php foreach ($modelListAnggota as $i => $modelAnggota): ?>
            <div class="panel panel-default"><!-- widgetBody -->
                <div class="panel-heading">
                    <h3 class="panel-title pull-left">Daftar Anggota</h3>
                    <div class="pull-right">
                        <button type="button" class="add-item btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
                            
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-body">
                    <?php
                       // necessary for update action.
                        if (! $modelAnggota->isNewRecord) {
                            echo Html::activeHiddenInput($modelAnggota, "[{$i}]id");
                        }
                    ?>
                        
                    <table class='container-items table table-bordered'>
                        <thead>
                            <tr>
                                <th>Anggota</th>
                                <th>Jabatan</th>
                                <th><center>Opsi</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class='item'>                                   
                                <td><?= $form->field($modelAnggota, "[{$i}]id_anggota")->widget(Select2::classname(), [
                                    'data'=>$listAnggota,
                                    'options'=>['placeholder'=>'Pilih Anggota'],
                                    'pluginOptions'=>[
                                        'allowClear'=>true,
                                    ]
                                ])->label(false) ?></td>
                                <td><?= $form->field($modelAnggota, "[{$i}]jabatan")->textInput(['maxlength' => true])->label(false) ?></td>
                                
                                <td><center><button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button></center></td>
                            </tr>
                        </tbody>
                    </table>
                        
                        
                </div>
            </div>
        <?php endforeach; ?>
    <?php DynamicFormWidget::end(); ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
