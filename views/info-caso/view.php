<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\InfoCaso */

$this->title = $model->id_infoc;
$this->params['breadcrumbs'][] = ['label' => 'Info Casos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="info-caso-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_infoc], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_infoc], [
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
            'id_infoc',
            'date_created',
            'tipo_caso',
            'quantidade_alunos',
            'polo',
            'id_descricao',
            'id_relator',
        ],
    ]) ?>

</div>
