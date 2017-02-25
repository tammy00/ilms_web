<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Turma */

$this->title = 'Update Turma: ' . $model->sigla;
$this->params['breadcrumbs'][] = ['label' => 'Turmas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->sigla, 'url' => ['view', 'id' => $model->sigla]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="turma-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
