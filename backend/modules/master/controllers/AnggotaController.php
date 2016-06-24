<?php

namespace app\modules\master\controllers;

use Yii;
use app\modules\master\models\Anggota;
use app\modules\master\models\DetileKontak;
use app\modules\master\models\AnggotaSearch;
use app\modules\master\models\DetileKepengurusan;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;
use yii\db\Transaction;

/**
 * AnggotaController implements the CRUD actions for Anggota model.
 */
class AnggotaController extends Controller
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
                    'delete' => ['post'],
                    'bulk-delete' => ['post'],
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
        $searchModel = new AnggotaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Displays a single Anggota model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {   
        $request = Yii::$app->request;
        if($request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                    'title'=> "Anggota #".$id,
                    'content'=>$this->renderAjax('view', [
                        'model' => $this->findModel($id),
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Edit',['update','id'=>$id],['class'=>'btn btn-primary','role'=>'modal-remote'])
                ];    
        }else{
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }
    }

    /**
     * Creates a new Anggota model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $request = Yii::$app->request;
        $model = new Anggota();  
        $listKecamatan = $model->getListKecamatan();
        $detile_kontak = new DetileKontak();
        $detile_kepengurusan = new DetileKepengurusan();
        $listPac = $detile_kepengurusan->getListPac();
        $listAnggota = $detile_kepengurusan->getListAnggota();

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> '<center><b>Tambah Anggota</b></center>',
                    'content'=>$this->renderAjax('create', [
                        'model' => $model,
                        'listKecamatan'=>$listKecamatan,
                        'detile_kontak'=>$detile_kontak,
                        'detile_kepengurusan'=>$detile_kepengurusan,
                        'listPac'=>$listPac,
                        'listAnggota'=>$listAnggota,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
        
                ];         
            }else if($model->load($request->post()) && $detile_kontak->load($request->post()) && $detile_kepengurusan->load($request->post())){

                $Transaction = Yii::$app->db->beginTransaction();
                try{
                    if($model->save()){
                        $detile_kontak->id_anggota = $model->id_anggota;
                        $detile_kontak->save();

                        $detile_kepengurusan->id_anggota = $model->id_anggota;
                        $detile_kepengurusan->save();

                        $Transaction->commit();
                        return [
                            'forceReload'=>'#crud-datatable-pjax',
                            'title'=> "Create new Anggota",
                            'content'=>'<span class="text-success">Create Anggota success</span>',
                            'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                    Html::a('Create More',['create'],['class'=>'btn btn-primary','role'=>'modal-remote'])
                
                        ];
                    }else{
                        $Transaction->rollBack();
                    }
                }catch(\Exception $e){
                    $Transaction->rollBack();
                    throw $e;
                }  
                         
            }else{           
                return [
                    'title'=> "Tambah Anggota",
                    'content'=>$this->renderAjax('create', [
                        'model' => $model,
                        'listKecamatan'=>$listKecamatan,
                        'detile_kontak'=>$detile_kontak,
                        'detile_kepengurusan'=>$detile_kepengurusan,
                        'listPac'=>$listPac,
                        'listAnggota'=>$listAnggota,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
        
                ];         
            }
        }else{
            /*
            *   Process for non-ajax request
            */
            if ($model->load($request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id_anggota]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
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
     * Updates an existing Anggota model.
     * For ajax request will return json object
     * and for non-ajax request if update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $request = Yii::$app->request;
        $model = $this->findModel($id);       
        $listKecamatan = $model->getListKecamatan();
        $detile_kontak = $model->getAnggotaDetile()->one();
        $detile_kepengurusan = $model->getDetileKepengurusan($model->id_anggota);

        


        if(is_null($detile_kepengurusan)){
            $detile_kepengurusan = new DetileKepengurusan();
        }else{
            $pac = $detile_kepengurusan->getPac($detile_kepengurusan->id_kepengurusan);
            $detile_kepengurusan->pac = $pac->id;
        }


        $listKep = $model->getListKepengurusan($detile_kepengurusan->pac);
        $listPac = $detile_kepengurusan->getListPac();
        $listAnggota = $detile_kepengurusan->getListAnggota();

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> "Update Anggota #".$id,
                    'content'=>$this->renderAjax('update', [
                        'model' => $model,
                        'listKecamatan'=>$listKecamatan,
                        'detile_kontak'=>$detile_kontak != null ? $detile_kontak : new DetileKontak(),
                        'detile_kepengurusan'=>$detile_kepengurusan != null ? $detile_kepengurusan : new DetileKepengurusan(),
                        'listPac'=>$listPac,
                        'listAnggota'=>$listAnggota,
                        'listKep'=>$listKep,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
                ];         
            }else if($model->load($request->post()) ){

                $Transaction = Yii::$app->db->beginTransaction();
                try{
                    if($model->save()){

                        if($detile_kontak == null){
                            $detile_kontak = new DetileKontak();
                        }

                        $detile_kontak->load($request->post());

                        if($detile_kontak->id == null){
                            $detile_kontak->id_anggota = $model->id_anggota;
                        }

                        $detile_kepengurusan->load($request->post());

                        
                        $detile_kontak->save();

                        $detile_kepengurusan->save();

                        $Transaction->commit();
                        return [
                            'forceReload'=>'#crud-datatable-pjax',
                            'title'=> "Create new Anggota",
                            'content'=>'<span class="text-success">Create Anggota success</span>',
                            'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                    Html::a('Create More',['create'],['class'=>'btn btn-primary','role'=>'modal-remote'])
                
                        ];
                    }else{
                        $Transaction->rollBack();
                    }
                }catch(\Exception $e){
                    $Transaction->rollBack();
                    throw $e;
                }
                
            }else{
                 return [
                    'title'=> "Update Anggota #".$id,
                    'content'=>$this->renderAjax('update', [
                        'model' => $model,
                        'listKecamatan'=>$listKecamatan,
                        'detile_kontak'=>$detile_kontak != null ? $detile_kontak: new DetileKontak(),
                        'detile_kepengurusan'=>$detile_kepengurusan != null ? $detile_kepengurusan : new DetileKepengurusan(),
                        'listPac'=>$listPac,
                        'listAnggota'=>$listAnggota,
                        'listKep'=>$listKep,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
                ];        
            }
        }else{
            /*
            *   Process for non-ajax request
            */
            if ($model->load($request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id_anggota]);
            } else {
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        }
    }

    /**
     * Delete an existing Anggota model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $request = Yii::$app->request;
        $this->findModel($id)->delete();

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['forceClose'=>true,'forceReload'=>'#crud-datatable-pjax'];
        }else{
            /*
            *   Process for non-ajax request
            */
            return $this->redirect(['index']);
        }


    }

     /**
     * Delete multiple existing Anggota model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionBulkDelete()
    {        
        $request = Yii::$app->request;
        $pks = explode(',', $request->post( 'pks' )); // Array or selected records primary keys
        foreach ( $pks as $pk ) {
            $model = $this->findModel($pk);
            $model->delete();
        }

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['forceClose'=>true,'forceReload'=>'#crud-datatable-pjax'];
        }else{
            /*
            *   Process for non-ajax request
            */
            return $this->redirect(['index']);
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
