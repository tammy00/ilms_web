<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PesquisasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pesquisas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pesquisas-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Pesquisas', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_pesquisa',
            'id_solucao',
            'id_usuario',
            'id_polo',
            'relator',
            // 'natureza_problema:ntext',
            // 'descricao_problema:ntext',
            // 'problema_detalhado:ntext',
            // 'palavras_chaves',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
