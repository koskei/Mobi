<?php

use yii\helpers\Html;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model backend\models\Surveys */

$this->title = 'Create Surveys';
$this->params['breadcrumbs'][] = ['label' => 'Surveys', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="surveys-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
