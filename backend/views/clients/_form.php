<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Countries;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model backend\models\Clients */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="clients-form">  

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'clientName')->textInput(['maxlength' => true]) ?>
    <?=
    $form->field($model, 'country_id')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Countries::find()->all(), 'country_id', 'name'),
        'language' => 'de',
        'options' => ['placeholder' => 'Select default Client Country.'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>
  

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
