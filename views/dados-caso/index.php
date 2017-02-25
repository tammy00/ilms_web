<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DadosCasoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Dados Casos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dados-caso-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Dados Caso', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'date_created',
            'tipo_caso',
            'turma_id',
            'qtde_alunos',
            // 'polo',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
