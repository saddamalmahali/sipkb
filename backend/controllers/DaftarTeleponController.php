<?php 

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class DaftarTeleponController extends Controller
{
	public function actionIndex(){
		return $this->render('index');
	}
}