<?php

namespace backend\controllers;

use Yii;
use backend\models\Transissue;
use backend\models\TransissueSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Session;
use yii\bootstrap\Modal;

$session = new Session();
$session->open();

/**
 * TransissueController implements the CRUD actions for Transissue model.
 */
class TransissueController extends Controller
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
     * Lists all Transissue models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TransissueSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Transissue model.
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
     * Creates a new Transissue model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Transissue();
        $modelrunno = \backend\Models\Sequence::find()->where(['activitytype'=>4])->one();
      $zero = '';
        $runno = '';
        $newno = $modelrunno->currentno + 1;
        $i = $modelrunno->len - strlen((string)$newno);
        if($i == $modelrunno->len){
            for($m=1;$m<=$modelrunno->len-1;$m++){
                $zero.='0';
            }
            $runno = $modelrunno->prefix.$zero.$newno;
        }else{
            
             for($m=1;$m<=$modelrunno->len- strlen((string)$newno);$m++){
                   
                      $zero.='0';
               
            }
            $runno = $modelrunno->prefix.$zero.$newno;
        }

        if ($model->load(Yii::$app->request->post())) {
            $model->transtype = 4;
            $model->transdate = $model->transdate ==''?date('Y-m-d'): date('Y-m-d',  strtotime($model->transdate));
            if($model->save()){
                 $updateno = (int)substr($model->transno, 3,  strlen($model->transno));
                 $model2 = \backend\Models\Sequence::find()->where(['activitytype'=>4])->one();
                 $model2->currentno = $updateno;
                 $model2->save();
                return $this->redirect(['update', 'id' => $model->recid]);
            }
            
        } else {
            return $this->render('create', [
                'model' => $model,
                'runno'=>$runno,
            ]);
        }
    }

    /**
     * Updates an existing Transissue model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
         $session = new Session();
        $session->open();
        
        $session['recid'] = $model->recid;
        $modelline = \backend\Models\Transline::find()->where(['transtableid'=>$id])->all();

        if ($model->load(Yii::$app->request->post())) {
            $model->transdate = $model->transdate ==''?date('Y-m-d'): date('Y-m-d',  strtotime($model->transdate));
            if($model->save()){
            return $this->redirect(['update', 'id' => $model->recid]);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
                'modelline'=>$modelline,
            ]);
        }
    }

    /**
     * Deletes an existing Transissue model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        \backend\Models\Transline::deleteAll(['transtableid'=>$id]);
        return $this->redirect(['index']);
    }

    /**
     * Finds the Transissue model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Transissue the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Transissue::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    public function actionGetdetail(){
        if(\Yii::$app->request->isAjax){
            $res = [];
            $prodid = \Yii::$app->request->post('id');
            if($prodid != ''){
                $model = \backend\Models\Product::find()->where(['prodcode'=>$prodid])->one();
                
                array_push($res, $model->prodname);
                array_push($res, '1');
                array_push($res, $this->Saleunit($model->saleunit));
                array_push($res, '2000');
                array_push($res, 1 * 2000);
   
            }
            
            
            echo json_encode($res);
        }
    }
       public function actionPostline(){
        if(\Yii::$app->request->isAjax){
            $transid = \Yii::$app->request->post('transid');
            if($transid !=''){
                $model = \backend\Models\Transline::find()->where(['transtableid'=>$transid])->all();
                 if(count($model)==0){
                    echo 0;
                    return;
                }
                foreach ($model as $x){
                      $model2 = \backend\Models\Productonhand::find()->where(['prodid'=>$x->prodid,'warehouseid'=>$x->warhouseid,'locationid'=>$x->locationid,'lotid'=>$x->lotid])->one();
                      if(count($model2)<=0){
                          echo 200;
                          return;
                      }else{
                          if($model2->qty < $x->qty){
                              echo 200;
                              return;
                          }
                          
                      }
                }
                
               $res = 0;
                foreach ($model as $data){
                    $res = $this->AddOnhand($data->prodid, $data->warhouseid, $data->locationid,$data->lotid, $data->qty);
                }
                if($res == 1){
                    $model2 = \backend\Models\Transtable::find()->where(['recid'=>$transid])->one();
                    $model2->status = 100;
                    $model2->save();
                }
                echo $res;
                return;
            }
        }
     }
    public function actionUpdateline(){
        if(\Yii::$app->request->isAjax){
            $transid = \Yii::$app->request->post('transid');
            $id = \Yii::$app->request->post('id');
            $prodcode = \Yii::$app->request->post('prodcode');
            $wh = \Yii::$app->request->post('wh');
            $loc = \Yii::$app->request->post('loc');
            $lot = \Yii::$app->request->post('lot');
            $qty = \Yii::$app->request->post('qty');
            $unit = \Yii::$app->request->post('unit');
           
           
           // print_r($prodcode);return;
           // echo "id=".  $loc[0];
         //  echo "id=".  $prodcode[1];
//            echo "prodcode=". count($prodcode);
//           echo "qty=". count($qty);
//           echo "price=". count($price);
//           echo "org_group=". count($org_group);
          // return;
           $i = 0;
           if(count($id)>0){
               $res =0;
               \backend\Models\transline::deleteAll(['transtableid'=>$transid]);
               foreach ($id as $recid){
                     
                       $model2 = new \backend\Models\Transline();
                       
                       $model2->transtableid = $transid;
                       $model2->prodid = $this->prodid($prodcode[$i]) ;
                       $model2->transtype = 4;
                       $model2->warhouseid = $this->Wh($wh[$i]) ;
                       $model2->locationid = $loc[$i] ;
                       $model2->lotid = $lot[$i] ;
                     //  $model2->transin = $qty[$i]>=0?$qty[$i]:0;
                       $model2->transout = $qty[$i];
                       $model2->qty = doubleval($qty[$i]);
                       $model2->unitid = $this->Saleunitid($unit[$i]);
                       

                       if($model2->save()){
                           $res+=1;
                       }
                 $i+=1;
               }
               if($res >0){
                   // return $res2;
               }
               
           }
        }
    }
    public function AddOnhand($prodid,$wh,$loc,$lot,$qty){
        $model = \backend\Models\Productonhand::find()->where(['prodid'=>$prodid,'warehouseid'=>$wh,'locationid'=>$loc,'lotid'=>$lot])->one();
        $realqty_old = 0;
        $reservqty_old = 0;
        $qty_old = 0;
        
        if(count($model)>0){
            $realqty_old = $model->realqty;
            $reservqty_old = $model->reservqty;
            $qty_old = $model->qty;
            
            $model->realqty = $realqty_old - $qty;
            $model->qty = $qty_old - $qty;
            if($model->save()){
                return 1;
            }
        }else{
            return 0;
        }
        
        
                
    }
    public function actionGetloc(){
        if(\Yii::$app->request->isAjax){
           
            $wh = \Yii::$app->request->post('id');
            
            if($wh != ''){
                $model = \backend\Models\Warehouse::find()->where(['warehousename'=>$wh])->one();
                $model2 = \backend\Models\Location::find()->where(['warehouseid'=>$model->recid])->all();
                if(count($model2)>0){
                    foreach ($model2 as $data){
                        echo "<option value=".$data->recid.">".$data->locationname."</option>";
                    }
                }else{
                    echo "<option></option>";
                }
            }else{
                    echo "<option></option>";
                }
            
        }
    }
        public function actionGetlot(){
        if(\Yii::$app->request->isAjax){
           
            $prodcode = \Yii::$app->request->post('id');
            
            if($prodcode != ''){
                $model = \backend\Models\Product::find()->where(['prodcode'=>$prodcode])->one();
                $model2 = \backend\Models\Lotnumber::find()->where(['prodid'=>$model->recid])->all();
                if(count($model2)>0){
                    foreach ($model2 as $data){
                        echo "<option value=".$data->recid.">".$data->lotnumbercode."</option>";
                    }
                }else{
                    echo "<option></option>";
                }
            }else{
                    echo "<option></option>";
                }
            
        }
    }
     public function Saleunit($id){
        $model = \backend\Models\Unit::find()->where(['recid'=>$id])->one();
        return $model->unitname;
    }
     public function Saleunitid($name){
        $model = \backend\Models\Unit::find()->where(['unitname'=>$name])->one();
        return $model->recid;
    }
     public function Prodid($code){
        $model = \backend\Models\Product::find()->where(['prodcode'=>$code])->one();
        return $model->recid;
    }
     public function Wh($code){
        $model = \backend\Models\Warehouse::find()->where(['warehousename'=>$code])->one();
        return $model->recid;
    }
//      public function loc($code){
//        $model = \backend\Models\Location::find()->where(['locationname'=>$code])->one();
//        return $model->recid;
//    }
//        public function lot($code){
//        $model = \backend\Models\Lotnumber::find()->where(['lotnumbername'=>$code])->one();
//        return $model->recid;
//    }

}
