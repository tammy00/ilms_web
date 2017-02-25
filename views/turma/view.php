<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Turma */

$this->title = $model->sigla;
$this->params['breadcrumbs'][] = ['label' => 'Turmas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="turma-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->sigla], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->sigla], [
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
            'sigla',
            'qtde_alunos',
            'outras_caracteristicas:ntext',
            'observacoes:ntext',
            'aplicativo_movel',
        ],
    ]) ?>

</div>
