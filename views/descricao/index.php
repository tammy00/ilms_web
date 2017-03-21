<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DescricaoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Descricaos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="descricao-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Descricao', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_descricao',
            'natureza_problema:ntext',
            'relator',
            'descricao_problema:ntext',
            'problema_detalhado:ntext',
            // 'palavras_chaves',
            // 'id_infoc',
            // 'id_polo',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
