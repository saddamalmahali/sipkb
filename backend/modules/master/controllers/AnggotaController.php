<?php

namespace app\modules\master\controllers;

use Yii;
use app\modules\master\models\Anggota;
use app\modules\master\models\AnggotaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AnggotaController implements the CRUD actions for Anggota model.
 */
class AnggotaController extends Controller
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
     * Lists all Anggota models.
     * @return mixed
     */
    public function actionIndex()
    {
		if (\Yii::$app->user->can('indexPost')) {
			$searchModel = new AnggotaSearch();
			$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

			return $this->render('index', [
				'searchModel' => $searchModel,
				'dataProvider' => $dataProvider,
			]);
		}else{
			return $this->render('error');
			//throw new \Exception('You are not allowed to access this page');
		}
        
    }

    /**
     * Displays a single Anggota model.
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
			return $this->render('error');
			//throw new \Exception('You are not allowed to access this page');
		}
        
    }

    /**
     * Creates a new Anggota model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
		if (\Yii::$app->user->can('createPost')) {
			$model = new Anggota();

			if ($model->load(Yii::$app->request->post()) && $model->save()) {
				return $this->redirect(['view', 'id' => $model->id_anggota]);
			} else {
				return $this->render('create', [
					'model' => $model,
				]);
			}
		}else{
			return $this->render('error');
			//throw new \Exception('You are not allowed to access this page');
		}
        
    }

    /**
     * Updates an existing Anggota model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
		if (\Yii::$app->user->can('updatePost')) {
			$model = $this->findModel($id);

			if ($model->load(Yii::$app->request->post()) && $model->save()) {
				return $this->redirect(['view', 'id' => $model->id_anggota]);
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
     * Deletes an existing Anggota model.
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
     * Finds the Anggota model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Anggota the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Anggota::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
