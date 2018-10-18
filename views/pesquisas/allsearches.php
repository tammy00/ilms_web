<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Polo;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PesquisasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Todas as buscas realizadas';
?>
<div class="pesquisas-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'id_polo',
                'value' => function ($data) {
                        $x = Polo::find()->where(['id_polo' => $data])->one();
                        return $x->nome;
                },
            ],
            [
                'attribute' => 'relator',

            ],
             'natureza_problema:ntext',
            // 'descricao_problema:ntext',
            // 'problema_detalhado:ntext',
             'palavras_chaves',
             'metodo',
            [
                'class' => 'yii\grid\ActionColumn',
                'header'=>'Ações',
                'headerOptions' => ['style' => 'text-align:center; color:#337AB7'],
                'contentOptions' => ['style' => 'text-align:center; vertical-align:middle'],
                'template' => '{view}',

            ],
        ],
    ]); ?>
</div>
