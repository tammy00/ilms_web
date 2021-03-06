<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Aplicativo */

$this->title = $model->id_aplicativo;
$this->params['breadcrumbs'][] = ['label' => 'Aplicativos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aplicativo-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_aplicativo], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_aplicativo], [
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
            'id_aplicativo',
            'nome',
            'observacoes:ntext',
            'id_turma',
        ],
    ]) ?>

</div>
