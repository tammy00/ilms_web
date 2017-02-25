<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Professor */

$this->title = 'Update Professor: ' . $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Professors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nome, 'url' => ['view', 'nome' => $model->nome, 'tipo_bolsa' => $model->tipo_bolsa, 'departamento' => $model->departamento]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="professor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
