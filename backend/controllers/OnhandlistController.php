<?php
namespace backend\controllers;
use Yii;
use yii\web\Session;

class OnhandlistController extends \yii\base\Controller{
    public function init() {
        $session = new Session();
        $session->open();
        if (empty($_SESSION['username'])) {
            return $this->redirect('index.php?r=site/login');
        }
    }  
    public function actionIndex(){
        $searchModel = new \backend\models\OnhandlistSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
   
}

