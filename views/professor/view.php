<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Professor */

$this->title = $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Professors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="professor-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'nome' => $model->nome, 'tipo_bolsa' => $model->tipo_bolsa, 'departamento' => $model->departamento], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'nome' => $model->nome, 'tipo_bolsa' => $model->tipo_bolsa, 'departamento' => $model->departamento], [
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
            'tipo_bolsa',
            'departamento',
            'outras_caracteristicas:ntext',
            'observacoes:ntext',
        ],
    ]) ?>

</div>
