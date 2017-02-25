<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tutor */

$this->title = 'Update Tutor: ' . $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Tutors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nome, 'url' => ['view', 'nome' => $model->nome, 'tipo_tutoria' => $model->tipo_tutoria, 'tipo_bolsa' => $model->tipo_bolsa, 'polo_id' => $model->polo_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tutor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
