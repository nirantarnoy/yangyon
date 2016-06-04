<?php

namespace backend\controllers;

use Yii;
use backend\models\Saletable;
use backend\models\SaletableSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Session;


/**
 * SaletableController implements the CRUD actions for Saletable model.
 */
class SaletableController extends Controller
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
     * Lists all Saletable models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SaletableSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Saletable model.
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
     * Creates a new Saletable model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Saletable();
        $modelcust = \backend\Models\Customer::find()->all();
        $modelpayment = \backend\Models\Payment::find()->all();
        $modelrunno = \backend\Models\Sequence::find()->where(['activitytype'=>10])->one();
        
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
            $model->status = 0;
            if($model->save()){
                      
                    $updateno = (int)substr($model->saleno, 3,  strlen($model->saleno));
                    $model2 = \backend\Models\Sequence::find()->where(['activitytype'=>10])->one();
                    $model2->currentno = $updateno;
                    $model2->save();
                    
                    $session = new Session();
                    $session->open();
                    $session->setFlash('msg','Save data successfull');
                    return $this->redirect(['update', 'id' => $model->recid]);
            }
           
        } else {
            return $this->render('create', [
                'model' => $model,
                'modelcust'=>$modelcust,
                'modelpayment'=>$modelpayment,
                'runno'=>$runno,
            ]);
        }
    }

    /**
     * Updates an existing Saletable model.
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
        
        
        $modelline = \backend\Models\Saleline::find()->where(['saleid'=>$model->recid])->all();
         $modelcust = \backend\Models\Customer::find()->all();
        $modelpayment = \backend\Models\Payment::find()->all();

        if ($model->load(Yii::$app->request->post()) ) {
            $model->totaltext = $this->numbertoletter($model->totalamt);
            if($model->save()){
                 $session = new Session();
                 $session->open();
                 $session->setFlash('msg','Save data successfull');
            return $this->redirect(['update', 'id' => $model->recid]);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
                'modelline'=>$modelline,
                'modelcust'=>$modelcust,
                'modelpayment'=>$modelpayment,
            ]);
        }
    }

    /**
     * Deletes an existing Saletable model.
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
     * Finds the Saletable model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Saletable the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Saletable::findOne($id)) !== null) {
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
                array_push($res, $model->saleprice);
                array_push($res, 1 * $model->saleprice);
   
            }
            
            
            echo json_encode($res);
        }
    }
    public function actionUpdateline(){
        if(\Yii::$app->request->isAjax){
            $saleid = \Yii::$app->request->post('saleid');
            $id = \Yii::$app->request->post('id');
            $prodcode = \Yii::$app->request->post('prodcode');
            $qty = \Yii::$app->request->post('qty');
            $wh = \Yii::$app->request->post('wh');
            $loc = \Yii::$app->request->post('loc');
            $lot = \Yii::$app->request->post('lot');
            $price = \Yii::$app->request->post('price');
            $unit = \Yii::$app->request->post('unit');
            $total = \Yii::$app->request->post('total');
 
          //  echo "id=".  $prodcode[0];
         //  echo "id=".  $prodcode[1];
//            echo "prodcode=". count($prodcode);
//           echo "qty=". count($qty);
//           echo "price=". count($price);
//           echo "org_group=". count($org_group);
     //      return;
           $i = 0;
           if(count($id)>0){
               $res =0;
               \backend\Models\Saleline::deleteAll(['saleid'=>$saleid]);
               foreach ($id as $recid){
                 
                       $model2 = new \backend\models\Saleline();
                       
                       $model2->saleid = $saleid;
                       $model2->prodid = $this->prodid($prodcode[$i]) ;
                       $model2->prodname = $this->prodname($this->prodid($prodcode[$i]));
                       $model2->qty = doubleval($qty[$i]) ;
                       $model2->warehouseid = $this->Wh($wh[$i]) ;
                       $model2->locationid = $loc[$i];
                       $model2->lotid = $lot[$i];
                       $model2->price = doubleval($price[$i]) ;
                       $model2->unit = $this->Saleunitid($unit[$i]);

                       if($model2->save()){
                           $res+=1;
                       }
                  $i+=1;
               }
               if($res >0){
                   echo "Update line success";
                   //return $this->redirect(['salepitable/update', 'id' => $session['recid']]);
               }
               
           }
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
    public function actionCheckprodtype(){
        if(\Yii::$app->request->isAjax){
           
            $prodcode = \Yii::$app->request->post('prodcode');
            
            if($prodcode != ''){
                $model = \backend\Models\Product::find()->where(['prodcode'=>$prodcode])->one();
                $model2 = \backend\Models\Productgroup::find()->where(['recid'=>$model->prodgroupid])->One();
                if(count($model2)>0){
                   
                        echo $model2->groupname;
                    
                }else{
                    echo "";
                }
            }else{
                    echo "";
                }
            
        }
    }
     public function actionCheckonhand(){
        if(\Yii::$app->request->isAjax){
            $prodcode = \Yii::$app->request->post('prodcode');
           // $qty = \Yii::$app->request->post('qty');
            $wh = \Yii::$app->request->post('wh');
            $loc = \Yii::$app->request->post('loc');
            $lot = \Yii::$app->request->post('lot');
            
            $res = [];
            
            $model = \backend\Models\Productonhand::find()->where(['prodid'=>  $this->Prodid($prodcode),'warehouseid'=>  $this->Wh($wh),'locationid'=>$loc,'lotid'=>$lot])->one();
            if(count($model)>0){
                echo $model->qty;
//                if($model->qty < (int)$qty){
//                    array_push($res, '1');
//                    array_push($res, 'จำนวนไม่พอ มีจำนวนเพียง '. $model->qty);
//                    
//                    echo json_encode($res);
//                    //return;
//                }else{
//                    array_push($res, '0');
//                    array_push($res, '');
//                    
//                    echo json_encode($res);
//                //return;
//                }
            }else{
                echo 0;
//                    array_push($res, '2');
//                    array_push($res, 'ไม่มียอดให้ตัดสต๊อก');
//                    
//                    echo json_encode($res);
                //return;
            }
        }
    }
    public function Prodid($code){
        $model = \backend\Models\Product::find()->where(['prodcode'=>$code])->one();
        return $model->recid;
    }
     public function Prodname($id){
        $model = \backend\Models\Product::find()->where(['recid'=>$id])->one();
        return $model->prodname;
    }
   public function Saleunit($id){
        $model = \backend\Models\Unit::find()->where(['recid'=>$id])->one();
        return $model->unitname;
    }
     public function Saleunitid($name){
        $model = \backend\Models\Unit::find()->where(['unitname'=>$name])->one();
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
    public  function actionPostsale($id){
        $modelline = \backend\Models\Saleline::find()->where(['saleid'=>$id])->all();
        $x = 0;
        $n = 0;
        if(count($modelline)> 0){
            foreach ($modelline as $data){
                $x = $this->AddOnhand($data->prodid, $data->warehouseid, $data->locationid,$data->lotid, $data->qty);
                if($x == 0){$n++;}
            }
            if($x == 1 && $n == 0){
                $model = \backend\Models\Saletable::find()->where(['recid'=>$id])->one();
                $model->status = 200;
                if($model->save()){
                    $session = new Session();
                    $session->open();
                    $session->setFlash('msg','Sales order posted successfull');
                    $this->redirect(['printdoc/invoice','id'=>$id]);
                }
            }else{
                    $session = new Session();
                    $session->open();
                    $session->setFlash('msg','พบข้อมผิดพลาด');
                    $this->redirect(['saletable/update','id'=>$id]);
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
    public function numbertoletter($num){
        $bahttext = sprintf("%1\$.2f",$num);
        $n = '';
        $thstring = '';
       
        $numtxt = ["ศูนย์", "หนึ่ง", "สอง", "สาม", "สี่", "ห้า", "หก", "เจ็ด", "แปด", "เก้า", "สิบ" ];
        $rank = ["", "สิบ", "ร้อย", "พัน", "หมื่น", "แสน", "ล้าน" ];
        $temp = explode(".",$bahttext);
       
        $intVal = $temp[0]; //เก็บจำนวนเต็ม
        $decVal = $temp[1]; //เก็บทศนิยม
       $xx = '';
         if (doubleval($bahttext) == 0)
        {
            $thstring = "ศูนย์บาทถ้วน";
        }else
        {
            for ($i = 0; $i < strlen($intVal); $i++)
            {
                $n = substr($intVal, $i, 1);
             
                if ($n != "0")
                { 
                    if ($i == strlen($intVal) - 1 && $n == "1" && strlen($intVal)==1)
                    {
                        $thstring .= $numtxt[1];
                    }
                    else if ($i == strlen($intVal) - 1 && $n == "1" && strlen($intVal)> 1)
                    {
                        $thstring .= "เอ็ด";
                    }
                    else if ($i == strlen($intVal) - 2 && $n == "2")
                    {
                        $thstring.= "ยี่สิบ";
                    }
                    else if ($i == strlen($intVal) - 2 && $n == "1" && strlen($intVal)==2)
                    {//echo strlen($intVal);return;
                       $thstring .= $rank[strlen($intVal) - 1];
                    }
                    else if ($i == strlen($intVal) - 2 && $n == "1" && strlen($intVal)==3)
                    {//echo strlen($intVal);return;
                       $thstring .= $rank[strlen($intVal) - 2];
                    }
                   else if ($i == strlen($intVal) - 2 && $n == "1" && strlen($intVal)==4)
                    {//echo strlen($intVal);return;
                       $thstring .= $rank[strlen($intVal) - 3];
                    }
                  else if ($i == strlen($intVal) - 2 && $n == "1" && strlen($intVal)==5)
                    {//echo strlen($intVal);return;
                       $thstring .= $rank[strlen($intVal) - 4];
                    }
                 
                    else
                    {
                        $thstring .= $numtxt[intVal($n)];
                        $thstring .= $rank[(strlen($intVal) - $i) - 1];
                    }

                }
            }

            $thstring .= "บาท";

        }
        
         if ($decVal == "00")
        {
            $thstring .= "ถ้วน";
        }
        else
        {
            for ($i = 0; $i < strlen($decVal); $i++)
            {
                $n = substr($decVal, $i, 1);
                if($n != "0"){

                    if ($i == strlen($decVal) - 1 && $n == "1")
                    {
                        $thstring .= "เอ็ด";
                    }
                    else if ($i == strlen($decVal) - 2 && $n == "2")
                    {
                        $thstring .= "ยี่สิบ";
                    }
                    else if ($i == strlen($decVal) - 2 && $n == "1")
                    {
                        $thstring .= $rank[strlen($decVal) - 1];
                    }
                    else
                    {
                        $thstring .= $numtxt[intval($n)];
                        $thstring .= $rank[(strlen($decVal) - $i) - 1];
                    }
                }

            }

            $thstring .= "สตางค์";
        }

        return $thstring;
    }
}
