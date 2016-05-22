<?php

namespace app\modules\auth\controllers;

use Yii;
use app\modules\auth\models\Coba;
use app\modules\auth\models\CobaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CobaController implements the CRUD actions for Coba model.
 */
class CobaController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Coba models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (\Yii::$app->user->can('indexPost')) {
			$searchModel = new CobaSearch();
			$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

			return $this->render('index', [
				'searchModel' => $searchModel,
				'dataProvider' => $dataProvider,
			]);
		}else{
			throw new \Exception('You are not allowed to access this page');
		}
		
    }

    /**
     * Displays a single Coba model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
		if (\Yii::$app->user->can('viewPost')) {
			return $this->render('view', [
				'model' => $this->findModel($id),
			]);
		}else{
			throw new \Exception('You are not allowed to access this page');
		}
        
    }

    /**
     * Creates a new Coba model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
		if (\Yii::$app->user->can('createPost')) {
			$model = new Coba();

			if ($model->load(Yii::$app->request->post()) && $model->save()) {
				return $this->redirect(['view', 'id' => $model->id]);
			} else {
				return $this->render('create', [
					'model' => $model,
				]);
			}
		}else{
			throw new \Exception('You are not allowed to access this page');
		}
        
    }

    /**
     * Updates an existing Coba model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
		
		if (\Yii::$app->user->can('updatePost')) {
			$model = $this->findModel($id);

			if ($model->load(Yii::$app->request->post()) && $model->save()) {
				return $this->redirect(['view', 'id' => $model->id]);
			} else {
				return $this->render('update', [
					'model' => $model,
				]);
			}
		}else{
			return $this->render('error');
			//throw new \Exception('You are not allowed to access this page');
		}
		
        
    }

    /**
     * Deletes an existing Coba model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
		
		if (\Yii::$app->user->can('deletePost')) {
			$this->findModel($id)->delete();

			return $this->redirect(['index']);
		}else{
			
			return $this->render('error');
			//throw new \Exception('You are not allowed to access this page');
		}
		
        
    }

    /**
     * Finds the Coba model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Coba the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Coba::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
