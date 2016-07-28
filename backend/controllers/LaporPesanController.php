<?php

namespace backend\controllers;
use Yii;
use app\models\LaporSmsSearch;
use app\models\LaporSms;

class LaporPesanController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $searchModel = new LaporSmsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $data = new LaporSms();

        $list_wilayah = $data->getWilayah();
        return $this->render('index',[
			'searchModel'=>$searchModel,
			'dataProvider'=>$dataProvider,
            'list_wilayah'=>$list_wilayah
		]);
    }
	
	public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return ;
    }
    
    public function actionCount(){
        
        $model = new LaporSms();
        
        return $model->getCharting();
    }
	
	protected function findModel($id)
    {
        if (($model = LaporSms::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    
    

}
