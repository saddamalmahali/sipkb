<?php

namespace app\modules\auth\controllers;

use Yii;
use common\modules\auth\models\AuthItem;
use common\modules\auth\models\auth_assigmentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RbacController implements the CRUD actions for AuthItem model.
 */
class RbacController extends Controller
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
     * Lists all AuthItem models.
     * @return mixed
     */
	 
	public function actionInit_permission(){
		$auth = Yii::$app->authManager;
		
		$createPost = $auth->createPermission('createPost');
		$createPost->description = 'Membuat postingan';
		$auth->add($createPost);
		
		$updatePost = $auth->createPermission('updatePost');
		$updatePost->description = 'Update Sebuah Posting';
		$auth->add($updatePost);
		
		$deletePost = $auth->createPermission('deletePost');
		$deletePost->description = 'Menghapus sebuah posting';
		$auth->add($deletePost);
		
		$viewPost = $auth->createPermission('viewPost');
		$viewPost->description =  'Melihat Posting';
		$auth->add($viewPost);
		
		$indexPost = $auth->createPermission('indexPost');
		$indexPost->description =  'Melihat Index Posting';
		$auth->add($indexPost);
		
	}
	
	public function actionInit_role(){
		$auth = Yii::$app->authManager;
		
		$createPost = $auth->createPermission('createPost');
		$updatePost = $auth->createPermission('updatePost');
		$deletePost = $auth->createPermission('deletePost');
		$viewPost = $auth->createPermission('viewPost');
		$indexPost = $auth->createPermission('indexPost');
		
		$author = $auth->createRole('author');
		$auth->add($author);
		$auth->addChild($author, $createPost);
		$auth->addChild($author, $indexPost);
		$auth->addChild($author, $viewPost);
		
		$admin = $auth->createRole('admin');
		$auth->add($admin);
		$auth->addChild($admin, $author);
		$auth->addChild($admin, $updatePost);
		$auth->addChild($admin, $deletePost);
		
	}
	
	
    public function actionIndex()
    {
        $searchModel = new auth_assigmentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AuthItem model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new AuthItem model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AuthItem();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->name]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing AuthItem model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->name]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing AuthItem model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the AuthItem model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return AuthItem the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AuthItem::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
