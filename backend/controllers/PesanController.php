<?php

namespace backend\controllers;

use Yii;
use common\models\Inbox;
use app\modules\master\models\Anggota;
use app\modules\master\models\AnggotaDetileKontakLink;
use app\modules\master\models\DetileKontak;
use common\models\Outbox;
use app\models\FormSms;
use common\models\InboxSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PesanController implements the CRUD actions for Inbox model.
 */
class PesanController extends Controller
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
     * Lists all Inbox models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new InboxSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionTulisPesan(){
        $model = new FormSms();

        if($model->load(Yii::$app->request->post())){
            $model->send();
            Yii::$app->session->setFlash('success', 'SMS telah disimpan untuk dikirim');
            
            return $this->redirect(['index']);

        }else{
            return $this->renderAjax('tulis-pesan', [
                    'model'=>$model,
                ]);
        }


    }

    public function actionMessage_routine(){
        if($messages = Inbox::find()->where(['Processed'=>'false'])->all()){
            echo "Data Diterima";
            foreach ($messages as $message) {
                echo "<p>Data ada</p>";
                $pesan  = strtoupper($message->TextDecoded);

                $pecah = explode("#", $pesan);
                $msg = '';

                if($pecah[0]=='CEK'){
                    echo "<p>Cek Data</p>";

                    $IDAnggota = $pecah[1];
                    $service = $pecah[2];
                    echo "Data Diterima,"; 

                    if($anggota = Anggota::find()->where(['id_anggota'=>$IDAnggota])->one()){
                        if($service == 'KONTAK'){

                            if($detilelink = AnggotaDetileKontakLink::find()->where(['id_anggota'=>$anggota->id_anggota])->one()){

                                if($detile = DetileKontak::find()->where(['id_detile_kontak'=>$detilelink->id_detile_kontak])->one()){

                                    $no_hp = $detile->no_hp;
                                    $email = $detile->email;
                                    $no_rumah = $detile->no_rumah;

                                    $msg = "data yang anda minta adalah : <br />Nama : $anggota->nama_anggota <br />No Hp : $no_hp";
                                } else{
                                    $msg = "maaf data yang anda minta tidak ada. terima kasih";
                                }



                            }
                        }else{
                            $msg = "maaf service yang anda minta tidak tersedia, terima kasih";
                            echo "maaf service yang anda minta tidak tersedia, terima kasih";
                        }
                    }else{
                        $msg = "maaf, data anggota yang anda minta tidak tersedia, terima kasih";
                        echo "maaf service yang anda minta tidak tersedia, terima kasih 2";
                    }

                    echo "<br />Kirim Data";
                    $out = new Outbox();
                    $out->TextDecoded = $msg;
                    $out->DestinationNumber = $message->SenderNumber;
                    if($out->save(false)){
                        echo "<br />Data Terkirim";
                        $message->Processed = 'true';

                        if($message->save(false)){
                            echo "<br />Data Telah Diupdate";
                        }
                    }else{
                        echo "Data Tidak Terkirim";
                    }
                    

                }
            }
        }else{
            echo "Tidak ada data yang harus diproses";
        }


    }

    /**
     * Displays a single Inbox model.
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
     * Creates a new Inbox model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {

        $model = new Outbox();
        /*
        $model = new Inbox();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }

        */
    }

    /**
     * Updates an existing Inbox model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Inbox model.
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
     * Finds the Inbox model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Inbox the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Inbox::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
