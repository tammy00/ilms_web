<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Disciplina */

$this->title = $model->id_nome;
$this->params['breadcrumbs'][] = ['label' => 'Disciplinas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="disciplina-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_nome], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_nome], [
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
            'departamento',
            'observacoes:ntext',
            'outras_caracteristicas:ntext',
        ],
    ]) ?>

</div>
