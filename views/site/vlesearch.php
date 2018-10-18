<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\grid\GridView;
use app\models\FigurasAva;

$this->title = 'Dados do Ambiente Virtual';
?>

<div>
    <h1><?= Html::encode($this->title) ?></h1>

    <a href="?r=site/index" class="btn btn-default">Voltar</a>
    
      <div class="col-xs-6 col-md-10"> 

        <?php 
              if ( isset($mensagem) )
              {    ?>
                  <div class="alert alert-danger">
                       <?php echo $mensagem ?>
                  </div>

              <?php }
        ?>
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
                        'attribute' => 'curso',
                        'contentOptions' => ['style' => 'text-align:center; vertical-align:middle'],
                        'headerOptions' => ['style' => 'text-align:center; color:#337AB7'],
                    ],
                    [
                        'attribute' => 'disciplina',
                        'contentOptions' => ['style' => 'text-align:center; vertical-align:middle'],
                        'headerOptions' => ['style' => 'text-align:center; color:#337AB7'],


                    ],
                    [
                        'attribute' => 'polo',
                        'contentOptions' => ['style' => 'text-align:center; vertical-align:middle'],
                        'headerOptions' => ['style' => 'text-align:center; color:#337AB7'],

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
                                if ( $model->aplicativo != 'LPGraph')
                                {
                                    $model_verdadeiro = FigurasAva::find()
                                              ->where(['aplicativo' => 'LPGraph'])
                                              ->andWhere(['curso' => $model->curso])
                                              ->andWhere(['disciplina' => $model->disciplina])
                                              ->andWhere(['ano_periodo' => $model->ano_periodo])
                                              ->andWhere(['total_alunos' => $model->total_alunos])
                                              ->one();
                                    if ( $model_verdadeiro == null )
                                    {
                                        return '';
                                    }
                                    else
                                    {
                                        return Html::a(
                                            'Trilha de Aprendizagem<br>',
                                            ['site/lpgraph', 'id' => $model_verdadeiro->id_figura], 
                                            [
                                                'title' => 'Grafo Trilha de Aprendizagem',
                                                'data-pjax' => '0',
                                            ]
                                        );                                        
                                    }
                                }
                                else
                                {
                                    return Html::a(
                                        'Trilha de Aprendizagem<br>',
                                        ['site/lpgraph', 'id' => $model->id_figura], 
                                        [
                                            'title' => 'Grafo Trilha de Aprendizagem',
                                            'data-pjax' => '0',
                                        ]
                                    );  
                                }
                            },
                            'behaviour' => function ($url, $model) 
                            {
                                if ( $model->aplicativo != 'LMSMonitor')
                                {
                                    $model_verdadeiro = FigurasAva::find()
                                              ->where(['aplicativo' => 'LMSMonitor'])
                                              ->andWhere(['curso' => $model->curso])
                                              ->andWhere(['disciplina' => $model->disciplina])
                                              ->andWhere(['ano_periodo' => $model->ano_periodo])
                                              ->andWhere(['total_alunos' => $model->total_alunos])
                                              ->one();
                                    if ( $model_verdadeiro == null )
                                    {
                                        return '';
                                    }
                                    else
                                    {
                                        return Html::a(
                                            'Reprovação e Aprovação<br>',
                                            ['site/behaviour', 'id' => $model_verdadeiro->id_figura], 
                                            [
                                                'title' => 'Monitoramento de Comportamento',
                                                'data-pjax' => '0',
                                            ]
                                        );                                        
                                    }
                                }
                                else
                                {
                                    return Html::a(
                                        'Reprovação e Aprovação<br>',
                                        ['site/behaviour', 'id' => $model->id_figura], 
                                        [
                                            'title' => 'Monitoramento de Comportamento',
                                            'data-pjax' => '0',
                                        ]
                                    );  
                                }

                            },
                            'desempenho' => function ($url, $model) 
                            {
                                if ( $model->aplicativo != 'WebMonitor')
                                {
                                    $model_verdadeiro = FigurasAva::find()
                                              ->where(['aplicativo' => 'WebMonitor'])
                                              ->andWhere(['curso' => $model->curso])
                                              ->andWhere(['disciplina' => $model->disciplina])
                                              ->andWhere(['ano_periodo' => $model->ano_periodo])
                                              ->andWhere(['total_alunos' => $model->total_alunos])
                                              ->one();
                                    if ( $model_verdadeiro == null )
                                    {
                                        return '';
                                    }
                                    else
                                    {
                                        return Html::a(
                                            'Participação e Tarefas<br>',
                                            ['site/desempenho', 'id' => $model_verdadeiro->id_figura], 
                                            [
                                                'title' => 'Monitoramento de Desempenho',
                                                'data-pjax' => '0',
                                            ]
                                        );                                        
                                    }
                                }
                                else
                                {
                                    return Html::a(
                                        'Reprovação e Aprovação<br>',
                                        ['site/desempenho', 'id' => $model->id_figura], 
                                        [
                                            'title' => 'Monitoramento de Desempenho',
                                            'data-pjax' => '0',
                                        ]
                                    );  
                                }
                            },
                        ],
                    ],
                ],
            ]); ?>


      </div>

</div>

