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
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'id_anak_cabang')->widget(Select2::classname(), [
                'data'=>$listAnakCabang,
                'options'=>['placeholder'=>'Pilih Anak Cabang'],
                'pluginOptions'=>[
                    'autoClose'=>true
                ]
            ]) ?>

            <?= $form->field($model, 'periode')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'no_sk')->textInput(['maxlength' => true]) ?>

            
        </div>
        <div class="col-md-6">
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


            

        </div>        
    </div>

    
    
    
    <div class="modal-footer">
        <?php if (!Yii::$app->request->isAjax){ ?>
                <div class="form-group">
                    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                </div>
            <?php } ?>        
    </div>

    <?php ActiveForm::end(); ?>
    
</div>
