<?php
use kartik\date\DatePicker;
use kartik\select2\Select2;

$wt = backend\Models\Worktime::find()->all();
?>

<div style="padding: 10px;" id="genpop">
    <div class="row" style="margin-bottom: 5px;">
        <div class="col-lg-12">
            <p><b>Start date</b></p>
             <?php
                        echo DatePicker::widget([
                            'name' => 'startdate',
                            //'model' => $model,
                           // 'attribute' => 'PackingDate',
                            'value' => date('dd-mm-yyyy', strtotime('+2 days')),
                            'type' => DatePicker::TYPE_COMPONENT_PREPEND,
                            'options' => ['placeholder' => 'Select date ...'],
                            'pluginOptions' => [
                                'format' => 'dd-mm-yyyy',
                                'autoclose' => true,
                                'todayHighlight' => true
                            ]
                        ]);
                        ?>
        </div>
           
        </div>
        <div class="row" style="margin-bottom: 5px;">
            <div class="col-lg-12">
                <p><b>End date</b></p>
                <?php
                        echo DatePicker::widget([
                            'name' => 'enddate',
                            //'model' => $model,
                           // 'attribute' => 'PackingDate',
                            'value' => date('dd-mm-yyyy', strtotime('+2 days')),
                            'type' => DatePicker::TYPE_COMPONENT_PREPEND,
                            'options' => ['placeholder' => 'Select date ...'],
                            'pluginOptions' => [
                                'format' => 'dd-mm-yyyy',
                                'autoclose' => true,
                                'todayHighlight' => true
                            ]
                        ]);
                        ?>
            </div>
            
        </div>
        <div class="row" style="margin-bottom: 5px;">
             <div class="col-lg-12">
                <p><b>Work Time</b></p>
            <?php echo kartik\select2\Select2::widget([
                'data'=>  yii\helpers\ArrayHelper::map($wt, 'recid', 'worktimename'),
                'name'=>'worktime',
                'language' => 'en',
                        'options' => ['placeholder' => 'Select......',
                        
                        ],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
            ])?>
             </div>
        </div>
    </div>

