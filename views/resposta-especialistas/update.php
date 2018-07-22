<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RespostaEspecialistas */

$this->title = 'Atualizar opinião';
$this->params['breadcrumbs'][] = ['label' => 'Resposta dos Especialistas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Opinião', 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="resposta-especialistas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
