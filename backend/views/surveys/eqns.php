<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use jlorente\remainingcharacters\RemainingCharacters;
use kartik\tabs\TabsX;
use yii\helpers\Url;




?>


<!-- /.box-header -->
<!-- form start -->
<?php $form = ActiveForm::begin(); ?>

<section class="content">

    <!-- SELECT2 EXAMPLE -->
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title"><?= $model->surveySurveys->title . " Poll"; ?></h3>


        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">


                        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                    </div>
                    <!-- /.form-group -->
                    <div class="form-group">

                        <?= $form->field($model, 'xls')->textInput(['maxlength' => true]) ?>
                    </div>
                    <!-- /.form-group -->
                </div>
                <!-- /.col -->
                <div class="col-md-6">
                    <div class="form-group">

                        <?=
                        $form->field($model, 'qns')->widget(RemainingCharacters::classname(), [
                            'type' => RemainingCharacters::INPUT_TEXTAREA,
                            'text' => Yii::t('app', '{n} characters remaining'),
                            'label' => [
                                'tag' => 'p',
                                'id' => 'my-counter',
                                'class' => 'counter',
                                'invalidClass' => 'error'
                            ],
                            'options' => [
                                'rows' => '3',
                                'class' => 'col-md-12',
                                'maxlength' => 160,
                                'placeholder' => Yii::t('app', 'Write something')
                            ]
                        ]);
                        ?>




                    </div>
                    <!-- /.form-group -->
                    <div class="form-group">
                        <?=
                        $form->field($model, 'skip')->widget(RemainingCharacters::classname(), [
                            'type' => RemainingCharacters::INPUT_TEXTAREA,
                            'text' => Yii::t('app', '{n} characters remaining'),
                            'label' => [
                                'tag' => 'p',
                                'id' => 'my-counter',
                                'class' => 'counter',
                                'invalidClass' => 'error'
                            ],
                            'options' => [
                                'rows' => '3',
                                'class' => 'col-md-12',
                                'maxlength' => 160,
                                'placeholder' => Yii::t('app', 'Write something')
                            ]
                        ]);
                        ?>
                    </div>
                    <!-- /.form-group -->
                </div>
                <?php $form = ActiveForm::end(); ?>

 <div>
                           <?php
                    
                   $items = [
                [
                    'label'=>'<i class="glyphicon glyphicon-book"></i>Unmatched Responses',
                    'content'=> $this->render('_postgrid',[
                                                            'rmodel' => $rmodel
                                                             
                                                        ]),
                    'active'=>true,
                    #'linkOptions'=>['data-url'=>Url::to(['admin/index2'])]
                ],
                [
                    'label'=>'<i class="glyphicon glyphicon-bookmark"></i> MultiMatched Responses ',
                    'content'=> $this->render('_multimatched',['model' => $model                                                        
                                                        ]),
                    //'linkOptions'=>['data-url'=>Url::to(['/surveys/index'])]
                ],
            ];


    echo TabsX::widget([
        'items'=>$items,
        'position'=>TabsX::POS_ABOVE,
        'encodeLabels'=>false
    ]);    
              ?>


               </div>
             
                
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        
     
    </div>
    <!-- /.box -->

    <div class="row">
        <div class="col-md-6">





        </div>

    </div>
    <!-- /.row -->

</section>

   <!-- /.content -->

