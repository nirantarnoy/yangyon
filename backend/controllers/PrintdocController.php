<?php

namespace backend\controllers;

use yii\web\Controller;

class PrintdocController extends Controller {

    public function init() {
        include("../../mpdf60/mpdf.php");
    }

    public function actionIndex() {

        $mpdf = new \mPDF('win-1252', 'letter', '', '', 20, 15, 48, 25, 10, 10);
        $mpdf->useOnlyCoreFonts = true;    // false is default
        $mpdf->SetProtection(array('print'));
        $mpdf->SetTitle("Jomyangyont Invoice");
        $mpdf->SetAuthor("Jomyangyont");
        //     $mpdf->SetWatermarkText("Paid");
//        $mpdf->showWatermarkText = true;
//        $mpdf->watermark_font = 'DejaVuSansCondensed';
//        $mpdf->watermarkTextAlpha = 0.1;
        $mpdf->SetDisplayMode('fullpage');


        $html = '
<html>
<head>
<style>
body {font-family:  sawasdee;
    font-size: 40pt;
}
p {    margin: 0pt;
}
td { vertical-align: top; }
.items td {
    border-left: 0.1mm solid #000000;
    border-right: 0.1mm solid #000000;
}
table thead td { background-color: #EEEEEE;
    text-align: center;
    border: 0.1mm solid #000000;
}
.items td.blanktotal {
    background-color: #FFFFFF;
    border: 0mm none #000000;
    border-top: 0.1mm solid #000000;
    border-right: 0.1mm solid #000000;
}
.items td.totals {
    text-align: right;
    border: 0.1mm solid #000000;
}
</style>
</head>
<body>

<!--mpdf
<htmlpageheader name="myheader">
<table width="100%"><tr>
<td width="50%" style="color:#0000BB;"><span style="font-weight: bold; font-size: 14pt;">Jom Yangyont</span><br />123 Anystreet<br />Your City<br />GD12 4LP<br /><span style="font-size: 15pt;">&#9742;</span> 01777 123 567</td>
<td width="50%" style="text-align: right;">Invoice No.<br /><span style="font-weight: bold; font-size: 12pt;">0012345</span></td>
</tr></table>
</htmlpageheader>

<htmlpagefooter name="myfooter">
<div style="border-top: 1px solid #000000; font-size: 9pt; text-align: center; padding-top: 3mm; ">
Page {PAGENO} of {nb}
</div>
</htmlpagefooter>

<sethtmlpageheader name="myheader" value="on" show-this-page="1" />
<sethtmlpagefooter name="myfooter" value="on" />
mpdf-->

<div style="text-align: right">Date: ' . date('jS F Y') . '</div>

<table width="100%" style="font-family: serif;" cellpadding="10">
<tr>
<td width="45%" style="border: 0.1mm solid #888888;"><span style="font-size: 7pt; color: #555555; font-family: sans;">SOLD TO:</span><br /><br />345 Anotherstreet<br />Little Village<br />Their City<br />CB22 6SO</td>
<td width="10%">&nbsp;</td>
<td width="45%" style="border: 0.1mm solid #888888;"><span style="font-size: 7pt; color: #555555; font-family: sans;">SHIP TO:</span><br /><br />345 Anotherstreet<br />Little Village<br />Their City<br />CB22 6SO</td>
</tr>
</table>


<table class="items" width="100%" style="font-size: 9pt; border-collapse: collapse;" cellpadding="8">
<thead>
<tr>
<td width="15%">REF. NO.</td>
<td width="10%">QUANTITY</td>
<td width="45%">DESCRIPTION</td>
<td width="15%">UNIT PRICE</td>
<td width="15%">AMOUNT</td>
</tr>
</thead>
<tbody>
<!-- ITEMS HERE -->
<tr>
<td align="center">MF1234567</td>
<td align="center">10</td>
<td>Large pack Hoover bags</td>
<td align="right">&pound;2.56</td>
<td align="right">&pound;25.60</td>
</tr>
<tr>
<td align="center">MX37801982</td>
<td align="center">1</td>
<td>Womans waterproof jacket<br />Options - Red and charcoal.</td>
<td align="right">&pound;112.56</td>
<td align="right">&pound;112.56</td>
</tr>
<tr>
<td align="center">MR7009298</td>
<td align="center">25</td>
<td>Steel nails; oval head; 30mm x 3mm. Packs of 1000.</td>
<td align="right">&pound;12.26</td>
<td align="right">&pound;325.60</td>
</tr>
<tr>
<td align="center">MF1234567</td>
<td align="center">10</td>
<td>Large pack Hoover bags</td>
<td align="right">&pound;2.56</td>
<td align="right">&pound;25.60</td>
</tr>
<tr>
<td align="center">MX37801982</td>
<td align="center">1</td>
<td>Womans waterproof jacket<br />Options - Red and charcoal.</td>
<td align="right">&pound;112.56</td>
<td align="right">&pound;112.56</td>
</tr>
<tr>
<td align="center">MR7009298</td>
<td align="center">25</td>
<td>Steel nails; oval head; 30mm x 3mm. Packs of 1000.</td>
<td align="right">&pound;12.26</td>
<td align="right">&pound;325.60</td>
</tr>
<tr>
<td align="center">MF1234567</td>
<td align="center">10</td>
<td>Large pack Hoover bags</td>
<td align="right">&pound;2.56</td>
<td align="right">&pound;25.60</td>
</tr>
<tr>
<td align="center">MX37801982</td>
<td align="center">1</td>
<td>Womans waterproof jacket<br />Options - Red and charcoal.</td>
<td align="right">&pound;112.56</td>
<td align="right">&pound;112.56</td>
</tr>
<tr>
<td align="center">MR7009298</td>
<td align="center">25</td>
<td>Steel nails; oval head; 30mm x 3mm. Packs of 1000.</td>
<td align="right">&pound;12.26</td>
<td align="right">&pound;325.60</td>
</tr>
<tr>
<td align="center">MF1234567</td>
<td align="center">10</td>
<td>Large pack Hoover bags</td>
<td align="right">&pound;2.56</td>
<td align="right">&pound;25.60</td>
</tr>
<tr>
<td align="center">MX37801982</td>
<td align="center">1</td>
<td>Womans waterproof jacket<br />Options - Red and charcoal.</td>
<td align="right">&pound;112.56</td>
<td align="right">&pound;112.56</td>
</tr>
<tr>
<td align="center">MR7009298</td>
<td align="center">25</td>
<td>Steel nails; oval head; 30mm x 3mm. Packs of 1000.</td>
<td align="right">&pound;12.26</td>
<td align="right">&pound;325.60</td>
</tr>
<tr>
<td align="center">MF1234567</td>
<td align="center">10</td>
<td>Large pack Hoover bags</td>
<td align="right">&pound;2.56</td>
<td align="right">&pound;25.60</td>
</tr>
<tr>
<td align="center">MX37801982</td>
<td align="center">1</td>
<td>Womans waterproof jacket<br />Options - Red and charcoal.</td>
<td align="right">&pound;112.56</td>
<td align="right">&pound;112.56</td>
</tr>
<tr>
<td align="center">MF1234567</td>
<td align="center">10</td>
<td>Large pack Hoover bags</td>
<td align="right">&pound;2.56</td>
<td align="right">&pound;25.60</td>
</tr>
<tr>
<td align="center">MX37801982</td>
<td align="center">1</td>
<td>Womans waterproof jacket<br />Options - Red and charcoal.</td>
<td align="right">&pound;112.56</td>
<td align="right">&pound;112.56</td>
</tr>
<tr>
<td align="center">MR7009298</td>
<td align="center">25</td>
<td>Steel nails; oval head; 30mm x 3mm. Packs of 1000.</td>
<td align="right">&pound;12.26</td>
<td align="right">&pound;325.60</td>
</tr>
<tr>
<td align="center">MR7009298</td>
<td align="center">25</td>
<td>Steel nails; oval head; 30mm x 3mm. Packs of 1000.</td>
<td align="right">&pound;12.26</td>
<td align="right">&pound;325.60</td>
</tr>
<tr>
<td align="center">MF1234567</td>
<td align="center">10</td>
<td>Large pack Hoover bags</td>
<td align="right">&pound;2.56</td>
<td align="right">&pound;25.60</td>
</tr>
<tr>
<td align="center">MX37801982</td>
<td align="center">1</td>
<td>Womans waterproof jacket<br />Options - Red and charcoal.</td>
<td align="right">&pound;112.56</td>
<td align="right">&pound;112.56</td>
</tr>
<tr>
<td align="center">MR7009298</td>
<td align="center">25</td>
<td>Steel nails; oval head; 30mm x 3mm. Packs of 1000.</td>
<td align="right">&pound;12.26</td>
<td align="right">&pound;325.60</td>
</tr>
<!-- END ITEMS HERE -->
<tr>
<td class="blanktotal" colspan="3" rowspan="6"></td>
<td class="totals">Subtotal:</td>
<td class="totals">&pound;1825.60</td>
</tr>
<tr>
<td class="totals">Tax:</td>
<td class="totals">&pound;18.25</td>
</tr>
<tr>
<td class="totals">Shipping:</td>
<td class="totals">&pound;42.56</td>
</tr>
<tr>
<td class="totals"><b>TOTAL:</b></td>
<td class="totals"><b>&pound;1882.56</b></td>
</tr>
<tr>
<td class="totals">Deposit:</td>
<td class="totals">&pound;100.00</td>
</tr>
<tr>
<td class="totals"><b>Balance due:</b></td>
<td class="totals"><b>&pound;1782.56</b></td>
</tr>
</tbody>
</table>
<div style="text-align: center; font-style: italic;">Payment terms: payment due in 30 days</div>
</body>
</html>
';

        $mpdf->WriteHTML($html);

        $mpdf->Output();
        exit;

        exit;
    }

    public function actionInvoice($id) {
        $model = \backend\Models\Saletable::findOne($id);
        $model2 = \backend\Models\Saleline::find()->where(['saleid' => $model->recid])->all();
        $model3 = \backend\Models\Company::find()->where(['recid' =>3])->one();
        $model4 = \backend\Models\Address::find()->where(['addresstype' =>1,'addressofid'=>3])->one();
        $model5 = \backend\Models\Customer::find()->where(['recid' =>$model->customerid])->one();
        $model6 = \backend\Models\Address::find()->where(['addresstype' =>2,'addressofid'=>2])->one();
        
        $custtype = 0; //ลูกค้ามีรหัส
        $cusname = '';
        $cusaddress = '';
        $fulladdress2 = '';
        $custaxid = '';
     
        if($model5->customername == 'ลูกค้าทั่วไป'){
            $custtype = 1;
            $custdata = explode('  ', $model->remark);
            $cusname = $custdata[0];
            $cusaddress = '';
           
            for($i=1;$i<=count($custdata);$i++){
                if($i == count($custdata)-1){
                    $custaxid .= 'เลขที่ประจำตัวผู้เสียภาษี '.$custdata[$i];
                }else{
                    if($i < count($custdata)-2){
                        $fulladdress2 .= $custdata[$i].'<br />';
                    }else{
                        $fulladdress2 .= $custdata[$i];
                    }
                }
               
            }
//            echo $cusname.'<br/>';
//              echo $fulladdress3;return;
        }else{
               $cusname = $model5->customername;
               $cusaddress = $model6->address;
               $fulladdress2 = "ต.".$model6->districts->DISTRICT_NAME." "."อ.".$model6->citys->AMPHUR_NAME." "."จ.".$model6->provinces->PROVINCE_NAME." ".$model6->citys->POSTCODE;
                $custaxid ="เลขที่ประจำตัวผู้เสียภาษี ".$model5->taxid ;
        }
        $note = $model->note;
        $alldiscount = $model->discountamt + $model->discountperamt;
        $vat = $model->vatamt;
        
        $fulladdress = "ต.".$model4->districts->DISTRICT_NAME." "."อ.".$model4->citys->AMPHUR_NAME." "."จ.".$model4->provinces->PROVINCE_NAME." ".$model4->citys->POSTCODE;
         $xx = '';
        $subtotal = 0;
       
        
        $total = 0;
        $m = 0;
        foreach ($model2 as $data) {
            $m++;
            $subtotal = $subtotal + ($data->qty * $data->price);
            $xx.='<tr><td style="text-align: center">'.$m.'</td><td style="text-align: center">' . $this->prodCode($data->prodid) . '</td><td>'. $this->prodName($data->prodid) .'</td><td style="text-align: right">'. number_format($data->qty,0) .'</td><td style="text-align: right">'. number_format($data->price,2) .'</td><td style="text-align: right">'. number_format($data->qty * $data->price,2) .'</td></tr>';
        }
        $maxrow =25;
        $addrow = 0;
        if(count($model2)<$maxrow){
            $addrow = $maxrow - count($model2);
                for($i=1;$i<=$addrow;$i++){
                      $xx.='<tr><td></td><td style="text-align: center"></td><td></td><td style="text-align: right"></td><td style="text-align: right"></td><td style="text-align: right"></td></tr>';
                }
        }
       // echo $addrow;return;
      
        
          $total = ($subtotal - $alldiscount) + $vat;

        //$mpdf = new \mPDF('win-1252', 'letter', '', '', 20, 15, 48, 25, 10, 10);
        $mpdf = new \mPDF('win-1252', 'Letter', '', '', 10, 10, 40, 5, 5, 5);
        $mpdf->useOnlyCoreFonts = true;    // false is default
        $mpdf->SetProtection(array('print'));
        $mpdf->SetTitle("Jomyangyont Invoice");
        $mpdf->SetAuthor("Jomyangyont");
        //     $mpdf->SetWatermarkText("Paid");
//        $mpdf->showWatermarkText = true;
//        $mpdf->watermark_font = 'DejaVuSansCondensed';
//        $mpdf->watermarkTextAlpha = 0.1;
        $mpdf->SetDisplayMode('fullpage');
        
        $html = '
<html>
<head>
<style>
body {font-family:  arial;
    font-size: 10pt;
}
p {    margin: 0pt;
}
td { vertical-align: top; }
.items{
    margin-top: 15px;
}
.items td {
    border-left: 0.1mm solid #000000;
    border-right: 0.1mm solid #000000;
}
table thead td {
    text-align: center;
    border: 0.1mm solid #000000;
}
.items td.blanktotal {
    background-color: #FFFFFF;
    border: 0mm none #000000;
    border-top: 0.1mm solid #000000;
    border-right: 0.1mm solid #000000;
    border-left: 0.1mm solid #000000;
    border-bottom: 0.1mm solid #000000;
}
.items td.totals {
    text-align: right;
    border: 0.1mm solid #000000;
}
</style>
</head>
<body>

<!--mpdf
<htmlpageheader name="myheader">
<table width="100%"><tr>
<td width="15%" style="color:"><span><img src="../../uploads/yod.jpg" width="120px;"></td>
<td width="65%" style="color:"><span style="font-weight: bold; font-size: 16pt;">'.$model3->name.'</span><br />'.$model4->address.'<br />'.$fulladdress.' &nbsp;<span style="font-size: 13pt;"> &#9742;</span> '.$model3->tel.','.$model3->mobile.'<br />เลขที่ประจำตัวผู้เสียภาษี '.$model3->idno.'</td>
<td width="20%" style="text-align: right;font-weight: bold; font-size: 12pt;"><br /><span style="font-weight: bold; font-size: 12pt;"></span></td>
</tr></table>
</htmlpageheader>

<htmlpagefooter name="myfooter">
<div style="border-top: 1px solid #000000; font-size: 9pt; text-align: center; padding-top: 3mm; ">
Page {PAGENO} of {nb}
</div>
</htmlpagefooter>

<sethtmlpageheader name="myheader" value="on" show-this-page="1" />
<sethtmlpagefooter name="myfooter" value="off" />
mpdf-->

<table width="100%">
<tr>
<td width="100%" style="text-align: center;font-weight: bol; font-size: 15pt;">ใบส่งของ/ใบเสร็จรับเงิน</td>
</tr>
</table>
<!--<div style="text-align: right">Date: ' . date('jS F Y') . '</div>-->

<table width="100%" style="font-family: arial;top: -300px" cellpadding="10">
<tr>                                                                                                                                                                      
<td width="55%" style="font-family: arial;font-size: 15px;border: 1px solid;">ลูกค้า : <span style="font-family: arial;font-style: italic;">'.$cusname.'</span><br/>ที่อยู่ : <span style="font-family: arial;font-style: italic;">&nbsp;'.$cusaddress.'</span><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-family: arial;font-style: italic;">'   .$fulladdress2.'</span><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-family: arial;font-style: italic;">'   .$custaxid.'</span></td>
<td width="5%">&nbsp;</td>
<td width="40%" style="font-family: arial;font-size: 15px;border: 1px solid;">เลขที่ : <span style="font-family: arial;font-style: italic;">'.$model->saleno.'</span><br />วันที่ : <span style="font-family: arial;font-style: italic;">'.date("d/m/Y", strtotime($model->createdate)).'</span><br />เงื่อนไขชำระเงิน : <span style="font-family: arial;font-style: italic;">'.$model->terms->paymentname.'</span><br /></td>
</tr>
</table>


<table class="items" width="100%" style="font-size: 9pt; border-collapse: collapse;" cellpadding="8">
<thead>
<tr>
<td width="5%" style="font-size: 15px;">ลำดับ</td>
<td width="15%" style="font-size: 15px;">รหัสสินค้า</td>
<td width="45%" style="font-size: 15px;">รายละเอียด</td>
<td width="10%" style="font-size: 15px;">จำนวน</td>
<td width="15%" style="font-size: 15px;">ราคา/หน่วย</td>
<td width="15%" style="font-size: 15px;">ราคารวม</td>
</tr>
</thead>
<tbody>
    ' . $xx . '
      
<tr>
<td class="blanktotal" style="" colspan="4" rowspan="4" >
<b>หมายเหตุ</b><br /><br />
    '.$note.'
</td>

<td class="totals" style="font-size: 15px;">รวม</td>
<td class="totals">'.number_format($subtotal,2).'</td>
</tr>
<tr>
<td class="totals" style="font-size: 15px;">ส่วนลด</td>
<td class="totals">'.number_format($alldiscount,2).'</td>
</tr>
<tr>
<td class="totals" style="font-size: 15px;">ราคารวม</td>
<td class="totals">'.number_format($subtotal - $alldiscount,2).'</td>
</tr>
<tr>
<td class="totals" style="font-size: 15px;">VAT</td>
<td class="totals" >'.number_format($vat,2).'</td>
</tr>
<tr>
<td class="totals" style="font-size: 15px;text-align: center;"  colspan="4">
    <p style="font-size: 16px;font-style: italic;">'.$model->totaltext.' </p>
</td>
<td class="totals" style="font-size: 15px;">รวมทั้งสิ้น</td>
<td class="totals">'.number_format($total,2).'</td>
</tr>

</tbody>
</table>
<!--<div style="text-align: center; font-style: italic;">Payment terms: payment due in 30 days</div>-->
</body>
</html>
';
//        $html = "<html>"
//                ."<body>HEllo</body>"
//                . "</html>";
       $myfooter ='<table width="100%" style="margin-top: 15px;" cellpadding="15" >
                    <tr style="padding: 15px;">
                    <td width="50%" style="font-family: arial;font-size: 15px;">ผู้ส่งสินค้า___________________________<br/><br/>วันที่ ________/__________/__________</td>
                    <td width="50%" style="font-family: arial;font-size: 15px;">ผู้รับสินค้า___________________________<br/><br/>วันที่ ________/__________/__________</td>
                    </tr>
                </table>';
       
        
        $mpdf->WriteHTML($html);
        $mpdf->WriteHTML($myfooter);

        $mpdf->Output();
        exit;

        exit;
    }
    public function prodCode($param) {
        $model = \backend\Models\Product::find()->where(['recid'=>$param])->one();
        return $model->prodcode;
    }
     public function prodName($param) {
        $model = \backend\Models\Product::find()->where(['recid'=>$param])->one();
        return $model->prodname;
    }
    
}
