<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\grid\GridView;
use app\models\Polo;

$this->title = 'Dados do Ambiente Virtual';
$this->params['breadcrumbs'][] = $this->title;
?>

<div>
    <h1><?= Html::encode($this->title) ?></h1>
    
      <div class="col-xs-6 col-md-10"> 
        <br>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                //'filterModel' => $searchModel,
                'columns' => [
                    [
                       'class' => 'yii\grid\SerialColumn',
                        'headerOptions' => ['style' => 'text-align:center; color:#337AB7'],
                        'contentOptions' => ['style' => 'text-align:center; vertical-align:middle'],
                    ],
                    [
                        'attribute' => 'nome',
                        'contentOptions' => ['style' => 'text-align:center; vertical-align:middle'],
                        'headerOptions' => ['style' => 'text-align:center; color:#337AB7'],
                    ],
                    [
                        'attribute' => 'id_polo',
                        'contentOptions' => ['style' => 'text-align:center; vertical-align:middle'],
                        'headerOptions' => ['style' => 'text-align:center; color:#337AB7'],
                        'value' => function ($data) {
                                $polo = Polo::find()->where(['id_polo' => $data->id_polo])->one();
                                return $polo->nome;
                        },
                    ],
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'header'=>'Ações',
                        'headerOptions' => ['style' => 'text-align:center; color:#337AB7'],
                        'contentOptions' => ['style' => 'text-align:center; vertical-align:middle'],
                        'template' => '{lpgraph} {behaviour} {desempenho}',
                        'buttons' => 
                        [
                            'lpgraph' => function ($url, $model) 
                            {
                                //$valor = RespostaEspecialistas::find()->where(['id' => $pesquisa->id_resposta])->one();
                                return Html::a(
                                    'Trilha de Aprendizagem<br>',
                                    ['site/lpgraph', 'id' => $model->id_curso], 
                                    [
                                        'title' => 'Grafo Trilha de Aprendizagem',
                                        'aria-label' => 'Grafo Trilha de Aprendizagem',
                                        'data-pjax' => '0',
                                    ]
                                );
                            },
                            'behaviour' => function ($url, $model) 
                            {
                                //$valor = RespostaEspecialistas::find()->where(['id' => $pesquisa->id_resposta])->one();
                                return Html::a(
                                    'Monitoramento de Comportamento<br>',
                                    ['site/behaviour', 'id' => $model->id_curso], 
                                    [
                                        'title' => 'Monitoramento de Comportamento',
                                        'aria-label' => 'Monitoramento de Comportamento',
                                        'data-pjax' => '0',
                                    ]
                                );
                            },
                            'desempenho' => function ($url, $model) 
                            {
                                //$valor = RespostaEspecialistas::find()->where(['id' => $pesquisa->id_resposta])->one();
                                return Html::a(
                                    'Monitoramento de Desempenho<br>',
                                    ['site/desempenho', 'id' => $model->id_curso], 
                                    [
                                        'title' => 'Monitoramento de Desempenho',
                                        'aria-label' => 'Monitoramento de Desempenho',
                                        'data-pjax' => '0',
                                    ]
                                );
                            },
                        ],
                    ],
                ],
            ]); ?>


      </div>

</div>

