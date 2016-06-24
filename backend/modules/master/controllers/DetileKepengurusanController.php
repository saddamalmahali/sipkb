<?php

namespace app\modules\master\controllers;

use Yii;
use app\modules\master\models\DetileKepengurusan;
use app\modules\master\models\DetileKepengurusanSearch;
use app\modules\master\models\KepengurusanAnakCabang;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;

/**
 * DetileKepengurusanController implements the CRUD actions for DetileKepengurusan model.
 */
class DetileKepengurusanController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all DetileKepengurusan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DetileKepengurusanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single DetileKepengurusan model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new DetileKepengurusan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new DetileKepengurusan();
        $listPac = $model->getListPac();
        $listAnggota = $model->getListAnggota();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->renderAjax('create', [
                'model' => $model,
                'listPac'=>$listPac,
                'listAnggota'=>$listAnggota,
            ]);
        }
    }

    public function actionKepengurusan(){
        $out = [];

        if (isset($_POST['depdrop_parents'])) {
           $parents = $_POST['depdrop_parents'];

           if($parents != null){
                $pac = $parents[0];

                $out = $this->getKepengurusan($pac);

                echo Json::encode(['output'=>$out, 'selected'=>'']);

                return ;
           }

        }

        echo Json::encode(['output'=>'', 'selected'=>'']);
    }

    private function getKepengurusan($id){

        $time = new \DateTime('now');
        $today = $time->format('Y-m-d');    
        $kep = KepengurusanAnakCabang::find()->where(['id_anak_cabang'=>$id])
        ->andWhere(['>=', 'berlaku_sk', $today])->all();

        return ArrayHelper::toArray($kep, [
                'app\modules\master\models\KepengurusanAnakCabang'=>[
                    'id'=>'id',
                    'name'=>'periode',
                ]
                
            ]);
    }

    /**
     * Updates an existing DetileKepengurusan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing DetileKepengurusan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the DetileKepengurusan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return DetileKepengurusan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = DetileKepengurusan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
