<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Countries;
use backend\models\Languages;
use backend\models\Clients;
use kartik\datecontrol\DateControl;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model backend\models\Surveys */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="surveys-form">



    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?=
    $form->field($model, 'start_at')->widget(DateControl::classname(), [
        'type' => DateControl::FORMAT_DATETIME
    ]);
    ?>


    <?=
    $form->field($model, 'end_at')->widget(DateControl::classname(), [
        'type' => DateControl::FORMAT_DATETIME
    ]);
    ?>



    <?=
    //language
    $form->field($model, 'language_id')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Languages::find()->all(), 'language_id', 'language'),
        'language' => 'de',
        'options' => ['placeholder' => 'Select the desired the poll language ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>






    <?=
    $form->field($model, 'client_id')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Clients::find()->all(), 'client_id', 'clientName'),
        'language' => 'de',
        'options' => ['placeholder' => 'Select the desired Client ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>


    <?=
    $form->field($model, 'country_id')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Countries::find()->all(), 'country_id', 'name'),
        'language' => 'de',
        'options' => ['placeholder' => 'Select the Country the poll will run in.'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>

    <?=
    Html::activeHiddenInput($model, 'status_id', ['value' => 0]);
    ?>


    <div class="form-group">
<?= Html::submitButton($model->isNewRecord ? 'Create Poll' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

    </div>

<?php ActiveForm::end(); ?>

</div>
