<?php

namespace backend\controllers;

use Yii;
use backend\models\Product;
use backend\models\ProductSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\web\Session;


/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller
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
     * Lists all Product models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Product model.
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
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Product();
        $modelplan = \backend\Models\Plan::find()->all();
        $modelprodgroup = \backend\Models\Productgroup::find()->all();
        $modelprodcategory = \backend\Models\Productcategory::find()->all();
        $modelunit = \backend\Models\Unit::find()->all();
        $modelpacking = \backend\Models\Packing::find()->all();
        $modelmodel = \backend\Models\Productmodel::find()->all();
        
        if ($model->load(Yii::$app->request->post())) {
            $uploaded = UploadedFile::getInstance($model, 'photo');
            if(!empty($uploaded)){
                  $upfiles = time() . "." . $uploaded->getExtension();

                    if ($uploaded->saveAs('../../uploads/' . $upfiles)) {
                       $model->photo = $upfiles;
                    }
            }
            if($model->save()){
                 return $this->redirect(['update', 'id' => $model->recid]);
            }
           
        } else {
            return $this->render('create', [
                'model' => $model,
                'modelplan' => $modelplan,
                'modelprodgroup' => $modelprodgroup,
                'modelprodcategory' => $modelprodcategory,
                'modelunit'=>$modelunit,
                'modelpacking'=>$modelpacking,
                'modelmodel'=>$modelmodel,
            ]);
        }
    }

    /**
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modelplan = \backend\Models\Plan::find()->all();
        $modelprodgroup = \backend\Models\Productgroup::find()->all();
        $modelprodcategory = \backend\Models\Productcategory::find()->all();
        $modelunit = \backend\Models\Unit::find()->all();
        $modelunit = \backend\Models\Unit::find()->all();
        $modelpacking = \backend\Models\Packing::find()->all();
        $modelmodel = \backend\Models\Productmodel::find()->all();
        
        if ($model->load(Yii::$app->request->post())) {
            $uploaded = UploadedFile::getInstance($model, 'photo');
            if(!empty($uploaded)){
                  $upfiles = time() . "." . $uploaded->getExtension();

                    if ($uploaded->saveAs('../../uploads/' . $upfiles)) {
                       $model->photo = $upfiles;
                       $model2 = \backend\Models\Product::findOne($id);
                       if($model2->photo !=''){
                          unlink('../../uploads/'.$model2->photo);
                       }
                    }
            }else{
                $oldmodel = $this->findModel($id);
                $model->photo = $oldmodel->photo;
            }
            if($model->save()){
                 return $this->redirect(['update', 'id' => $model->recid]);
            }
           
        } else {
            return $this->render('update', [
                'model' => $model,
                'modelplan' => $modelplan,
                'modelprodgroup' => $modelprodgroup,
                'modelprodcategory' => $modelprodcategory,
                'modelunit'=>$modelunit,
                'modelpacking'=>$modelpacking,
                'modelmodel'=>$modelmodel,
            ]);
        }
    }

    /**
     * Deletes an existing Product model.
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
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    public function actionChkcode(){
        if(\Yii::$app->request->isAjax){
            $prodid = \Yii::$app->request->post('id');
            if($prodid != ''){
                $model = \backend\Models\Product::find()->where(['prodcode'=>$prodid])->one();
                if(count($model)>0){
                    return 1;
                }else{
                    return 0;
                }
   
            }else{
                return 0;
            }
           
        }
    }
}