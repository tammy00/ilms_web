<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Solucao */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Solucaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="solucao-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
            'id',
            'diagnostico',
            'solucao',
            'palavras_chaves',
            'acao_implementada',
            'solucao_implementada',
            'efetividade_acao_implementada',
            'custos',
            'impacto_pedagogico',
            'atores_envolvidos',
        ],
    ]) ?>

</div>
