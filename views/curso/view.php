<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Curso */

$this->title = $model->polo_id;
$this->params['breadcrumbs'][] = ['label' => 'Cursos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="curso-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'polo_id' => $model->polo_id, 'tipo_curso' => $model->tipo_curso, 'duracao' => $model->duracao, 'departamento' => $model->departamento, 'coordenador' => $model->coordenador], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'polo_id' => $model->polo_id, 'tipo_curso' => $model->tipo_curso, 'duracao' => $model->duracao, 'departamento' => $model->departamento, 'coordenador' => $model->coordenador], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_nome',
            'polo_id',
            'tipo_curso',
            'duracao',
            'departamento',
            'coordenador',
            'outras_caracteristicas:ntext',
            'observacoes:ntext',
        ],
    ]) ?>

</div>
