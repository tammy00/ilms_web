<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Polo;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PesquisasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Base de Casos - RBC';
?>
<div class="pesquisas-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    [
                        'attribute' => 'id_descricao',
                        'headerOptions' => ['style' => 'text-align:center; color:#337AB7'],
                        'contentOptions' => ['style' => 'text-align:center; vertical-align:middle'],
                        'label' => 'Casos na Base',
                         'value'=>function ($model, $key, $index, $widget) { 
                               return 'Caso '.$model->id_descricao;
                           },
                    ],
                    [
                        'attribute' => 'id_polo',
                        'headerOptions' => ['style' => 'text-align:center; color:#337AB7'],
                        'contentOptions' => ['style' => 'text-align:center; vertical-align:middle'],
                        //'label' => 'Casos na Base',
                         'value'=>function ($model, $key, $index, $widget) { 
                            $info_polo = Polo::find()->where(['id_polo' => $model->id_polo])->one();
                               return $info_polo->nome;
                           },
                    ],
                    [
                        'attribute' => 'natureza_problema',
                        'headerOptions' => ['style' => 'text-align:center; color:#337AB7'],
                        'contentOptions' => ['style' => 'text-align:center; vertical-align:middle'],
                        //'label' => 'Casos na Base',
                         'value'=>function ($model, $key, $index, $widget) { 
                            //$info_polo = Polo::find()->where(['id_polo' -> $model->id_polo])->one();
                               return $model->natureza_problema;
                           },
                    ],
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'header'=>'Ação',
                        'headerOptions' => ['style' => 'text-align:center; color:#337AB7'],
                        'contentOptions' => ['style' => 'text-align:center; vertical-align:middle'],
                        'template' => '{casedetail}',
                        'buttons' => 
                        [
                            'casedetail' => function ($url, $model) 
                            {
                                //$valor = RespostaEspecialistas::find()->where(['id' => $pesquisa->id_resposta])->one();
                                return Html::a(
                                    'Visualizar descrição e solução',
                                    ['pesquisas/casedetail', 'id' => $model->id_descricao], 
                                    [
                                        'title' => 'Visualizar',
                                        'aria-label' => 'Visualizar',
                                        'data-pjax' => '0',
                                    ]
                                );
                            },
                        ],
                    ],
        ],
    
    ]); ?>

</div>
