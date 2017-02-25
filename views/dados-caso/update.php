<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DadosCaso */

$this->title = 'Update Dados Caso: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Dados Casos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="dados-caso-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
