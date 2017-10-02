<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RespostaEspecialistas */

$this->title = 'Update Resposta Especialistas: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Resposta Especialistas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="resposta-especialistas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
