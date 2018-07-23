<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\TipoProblema;
use app\models\TituloProblema;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RespostaEspecialistasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Opiniões dos Especialistas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="resposta-especialistas-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                //'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    [
                        'attribute' => 'id_tipo_problema',
                        'value' => function ($data) {
                                $tipoproblema = TipoProblema::find()->where(['id' => $data->id_tipo_problema])->one();
                                return $tipoproblema->tipo;
                        },
                    ],
                    [
                        'attribute' => 'id_titulo_problema',
                        'value' => function ($data) {
                                $tituloproblema = TituloProblema::find()->where(['id' => $data->id_titulo_problema])->one();
                                return $tituloproblema->titulo;
                        },
                    ],
                    [
                            'attribute' => 'data_ocorrencia',
                            'format' => ['date', 'php:d/m/Y']
                    ],  
                    [
                            'attribute' => 'data_insercao',
                            'format' => ['date', 'php:d/m/Y']
                    ], 
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'header'=>'Ações',
                        'headerOptions' => ['style' => 'text-align:center; color:#337AB7'],
                        'contentOptions' => ['style' => 'text-align:center; vertical-align:middle'],
                        'template' => '{view}',
                        'buttons' => 
                        [
                            'view' => function ($url, $model) 
                            {
                                //$valor = RespostaEspecialistas::find()->where(['id' => $pesquisa->id_resposta])->one();
                                return Html::a(
                                    '<span class="glyphicon glyphicon-eye-open"></span>',
                                    ['resposta-especialistas/view', 'id' => $model->id], 
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
