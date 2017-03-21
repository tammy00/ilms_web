<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SolucaoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Solucaos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="solucao-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Solucao', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_solucao',
            'solucao:ntext',
            'palavras_chaves',
            'acao_implementada:ntext',
            'solucao_implementada:ntext',
            // 'efetividade_acao_implementada:ntext',
            // 'custos',
            // 'impacto_pedagogico:ntext',
            // 'atores_envolvidos',
            // 'id_infoc',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
