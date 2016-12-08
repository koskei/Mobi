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
       
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
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
                        $form->field($model, 'qns'      )->widget(RemainingCharacters::classname(), [
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
                <div class="col-md-6">
                 
                    <!-- /.form-group -->
                    <div class="form-group">
                         <label>Repate</label>
                <select class="form-control select2" style="width: 100%;">
             
                  <option>1</option>
                  <option>2</option>
                  <option selected="selected">3</option>
                  <option>4</option>
                  <option>5</option>
                  
                </select>
              </div>
                    </div>
                    <!-- /.form-group -->
                </div>
                
                <div>
           


               </div>
                
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
       
 
    <!-- /.box -->

  
    <!-- /.row -->

</section>
<!-- /.content -->
<?php $form = ActiveForm::end(); ?>