<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use app\models\TipoProblema;
use app\models\TituloProblema;
use app\models\Pesquisas;
use app\models\RespostaEspecialistas;

/* @var $this yii\web\View */
/* @var $model app\models\Descricao */

/** view da pesquisa geral  **/

$this->title = 'Resultado(s) da busca'

?>
<div class="descricao-view">

    <h1><?= Html::encode($this->title) ?></h1>



    <?php if ( ($pesquisa->id_resposta > 0) && ($exp_resposta != null )) {   ?>
    <br><br>
    <fieldset>
            <legend>Opinião do Especialista</legend>

                <?= GridView::widget([
                'dataProvider' => $exp_resposta,
                //'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    //'id',
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
                    'descricao_problema',
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
            ]); } ?>
    </fieldset>
    <br>

    <p>
    <b>A solução recomendada ajudou na sua dúvida?</b>

          <?php $url = '?r=pesquisas/newcase&id='.$pesquisa->id_pesquisa; ?>
          
        <a href='<?php echo $url ?>' class="btn btn-primary">Sim</a>

        <?php $link = '?r=pesquisas/update&id='.$pesquisa->id_pesquisa;  ?>

        <a href='<?php echo $link ?>' class="btn btn-default">Não</a>

    </p>

</div>
