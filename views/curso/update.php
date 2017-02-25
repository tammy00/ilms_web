<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Curso */

$this->title = 'Update Curso: ' . $model->polo_id;
$this->params['breadcrumbs'][] = ['label' => 'Cursos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->polo_id, 'url' => ['view', 'polo_id' => $model->polo_id, 'tipo_curso' => $model->tipo_curso, 'duracao' => $model->duracao, 'departamento' => $model->departamento, 'coordenador' => $model->coordenador]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="curso-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
