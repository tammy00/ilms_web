<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Polo */

$this->title = $model->id_polo;
$this->params['breadcrumbs'][] = ['label' => 'Polos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="polo-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_polo], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_polo], [
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
            'id_polo',
            'nome',
            'coordenador',
            'tipo_conexao',
            'infra_laboratorio',
            'infra_fisica',
            'infra_cidade',
            'acesso',
            'outras_caracteristicas:ntext',
            'id_descricao',
            'id_turma',
            'id_curso',
        ],
    ]) ?>

</div>
