<?php

namespace backend\controllers;

use Yii;
use app\models\InboxSpamSearch;


class SpamPesanController extends \yii\web\Controller
{
    public function actionIndex()
    {
		$searchModel = new InboxSpamSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index',[
			'searchModel'=>$searchModel,
			'dataProvider'=>$dataProvider,
		]);
    }

}
