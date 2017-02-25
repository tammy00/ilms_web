<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Polo */

$this->title = $model->coordenador;
$this->params['breadcrumbs'][] = ['label' => 'Polos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="polo-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'coordenador' => $model->coordenador, 'tipo_conexao' => $model->tipo_conexao, 'infra_laboratorio' => $model->infra_laboratorio, 'infra_fisica' => $model->infra_fisica, 'infra_cidade' => $model->infra_cidade, 'acesso' => $model->acesso], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'coordenador' => $model->coordenador, 'tipo_conexao' => $model->tipo_conexao, 'infra_laboratorio' => $model->infra_laboratorio, 'infra_fisica' => $model->infra_fisica, 'infra_cidade' => $model->infra_cidade, 'acesso' => $model->acesso], [
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
            'coordenador',
            'tipo_conexao',
            'infra_laboratorio',
            'infra_fisica',
            'infra_cidade',
            'acesso',
            'outras_caracteristicas:ntext',
        ],
    ]) ?>

</div>
