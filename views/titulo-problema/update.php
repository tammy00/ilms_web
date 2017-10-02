<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TituloProblema */

$this->title = 'Update Titulo Problema: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Titulo Problemas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="titulo-problema-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
