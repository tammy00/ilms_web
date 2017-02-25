<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Descricao */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Descricaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="descricao-view">

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
            'natureza_problema',
            'relator',
            'curso_id',
            'disciplina_id',
            'descricao_problema',
            'problema',
            'palavras_chaves',
        ],
    ]) ?>

</div>
