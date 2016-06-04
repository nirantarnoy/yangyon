<?php

namespace backend\controllers;

use Yii;
use backend\models\Lotnumber;
use backend\models\LotnumberSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Session;

/**
 * LotnumberController implements the CRUD actions for Lotnumber model.
 */
class LotnumberController extends Controller
{
    /**
     * @inheritdoc
     */
    public function init() {
        $session = new Session();
        $session->open();
        if (empty($_SESSION['username'])) {
            return $this->redirect('index.php?r=site/login');
        }
    }  
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
     * Lists all Lotnumber models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new LotnumberSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Lotnumber model.
     * @param integer $recid
     * @param integer $prodid
     * @return mixed
     */
    public function actionView($recid, $prodid)
    {
        return $this->render('view', [
            'model' => $this->findModel($recid, $prodid),
        ]);
    }

    /**
     * Creates a new Lotnumber model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Lotnumber();

        if ($model->load(Yii::$app->request->post())) {
            $model->startdate = date('Y-m-d',  strtotime($model->startdate));
            $model->enddate = date('Y-m-d',  strtotime($model->enddate));
            if($model->save()){
            return $this->redirect(['view', 'recid' => $model->recid, 'prodid' => $model->prodid]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
    public function actionGetlifetime(){
        if(\Yii::$app->request->isAjax){
            $prodcode = \Yii::$app->request->post("prodcode");
            if($prodcode !=""){
                $model= \backend\Models\Product::find()->where(['recid'=>$prodcode])->one();
                if(count($model) > 0){
                    echo $model->lifetime;
                }else{
                    echo 0;
                }
                
            }else{
                echo 0;
            }
        }
    }

    /**
     * Updates an existing Lotnumber model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $recid
     * @param integer $prodid
     * @return mixed
     */
    public function actionUpdate($recid, $prodid)
    {
        $model = $this->findModel($recid, $prodid);

        if ($model->load(Yii::$app->request->post())) {
            $model->startdate = date('Y-m-d',  strtotime($model->startdate));
            $model->enddate = date('Y-m-d',  strtotime($model->enddate));
            if($model->save()){
            return $this->redirect(['view', 'recid' => $model->recid, 'prodid' => $model->prodid]);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Lotnumber model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $recid
     * @param integer $prodid
     * @return mixed
     */
    public function actionDelete($recid, $prodid)
    {
        $this->findModel($recid, $prodid)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Lotnumber model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $recid
     * @param integer $prodid
     * @return Lotnumber the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($recid, $prodid)
    {
        if (($model = Lotnumber::findOne(['recid' => $recid, 'prodid' => $prodid])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
