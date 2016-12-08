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
            <h3 class="box-title"></h3>


        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">


                        <?= $form->field($rmodel, 'errormsg')->textInput(['maxlength' => true]) ?>
                    </div>
                    <!-- /.form-group -->
                    <div class="form-group">

                        <?= $form->field($rmodel, 'unmatched')->textInput(['maxlength' => true]) ?>
                    </div>
                    <!-- /.form-group -->
                </div>
                <!-- /.col -->
                <div class="col-md-6">
                    <div class="form-group">

                        <?=
                        $form->field($rmodel, 'unmatched')->widget(RemainingCharacters::classname(), [
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
                
             
                
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        
       

        <!-- /.box-body -->
        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
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
<?php $form = ActiveForm::end(); ?>


         