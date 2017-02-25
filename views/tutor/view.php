<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Tutor */

$this->title = $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Tutors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tutor-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'nome' => $model->nome, 'tipo_tutoria' => $model->tipo_tutoria, 'tipo_bolsa' => $model->tipo_bolsa, 'polo_id' => $model->polo_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'nome' => $model->nome, 'tipo_tutoria' => $model->tipo_tutoria, 'tipo_bolsa' => $model->tipo_bolsa, 'polo_id' => $model->polo_id], [
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
            'id_matricula',
            'nome',
            'tipo_tutoria',
            'tipo_bolsa',
            'outras_caracteristicas:ntext',
            'observacoes:ntext',
            'polo_id',
        ],
    ]) ?>

</div>
