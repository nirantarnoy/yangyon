<?php

namespace backend\controllers;

use Yii;
use backend\models\Customer;
use backend\models\CustomerSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Session;

/**
 * CustomerController implements the CRUD actions for Customer model.
 */
class CustomerController extends Controller
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
     * Lists all Customer models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CustomerSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Customer model.
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
     * Creates a new Customer model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Customer();

       $model2 = new \backend\Models\Address();
        
        if ($model->load(Yii::$app->request->post()) && $model2->load(Yii::$app->request->post()) && $model->save()) {
            $model2->addresstype = 2;
            $model2->addressofid = $model->recid;
            if($model2->save()){
                return $this->redirect(['update', 'id' => $model->recid]);
            }
            
        } else {
            return $this->render('create', [
                'model' => $model,
                'model2' => $model2,
            ]);
        }
    }

    /**
     * Updates an existing Customer model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $model2 = \backend\Models\Address::find()->where(['addresstype'=>2,'addressofid'=>$id])->one();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
           // return $this->redirect(['view', 'id' => $model->recid]);
            return $this->redirect('index');
        } else {
            return $this->render('update', [
                'model' => $model,
                'model2' => $model2,
            ]);
        }
    }

    /**
     * Deletes an existing Customer model.
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
     * Finds the Customer model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Customer the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Customer::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    public function actionShowlist($id) {
        $count = \common\models\Amphur::find()->where(['PROVINCE_ID' => $id])->count();
        $model = \common\models\Amphur::find()->where(['PROVINCE_ID' => $id])->all();

        if ($count > 0) {
            foreach ($model as $value) {
             
                echo "<option value='" . $value->AMPHUR_ID . "'>$value->AMPHUR_NAME</option>";
             
            }
        } else {
            echo "<option>-</option>";
        }
    }
     public function actionShowlist1($id) {
        $count = \common\models\District::find()->where(['AMPHUR_ID' => $id])->count();
        $model = \common\models\District::find()->where(['AMPHUR_ID' => $id])->all();

        if ($count > 0) {
            foreach ($model as $value) {
             
                echo "<option value='" . $value->DISTRICT_ID . "'>$value->DISTRICT_NAME</option>";
             
            }
        } else {
            echo "<option>-</option>";
        }
    }
     public function actionShowlist2($id) {
          
        $count = \common\models\District::find()->where(['DISTRICT_ID' => $id])->count();
        $model = \common\models\District::find()->where(['DISTRICT_ID' => $id])->one();
 
        if ($count > 0) {
            $model2 = \common\models\Amphur::find()->where(['AMPHUR_ID' => $model->AMPHUR_ID])->one();
            echo $model2->POSTCODE;
        } else {
            echo "-";
        }
    }
}
