<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\InfoCaso */

$this->title = 'Update Info Caso: ' . $model->id_infoc;
$this->params['breadcrumbs'][] = ['label' => 'Info Casos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_infoc, 'url' => ['view', 'id' => $model->id_infoc]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="info-caso-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
