<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Descricao */
$this->title = 'Solução encontrada'

?>
<div class="descricao-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php if ( $pesquisa->relator != null ) {   ?>
    <b> DESCRIÇÃO REALIZADA: </b>
    <?= DetailView::widget([
        'model' => $pesquisa,
        'attributes' => [
            'natureza_problema:ntext',
            'relator',
            'descricao_problema:ntext',
            'problema_detalhado:ntext',
            'palavras_chaves',
            'id_polo',
        ],
    ]) ?>

    <?php if ( $sol != null ) {   ?>
    <b> SOLUÇÃO APRESENTADA: </b>
    <?= DetailView::widget([
        'model' => $sol,
        'attributes' => [
            'solucao:ntext',
            'palavras_chaves',
            'acao_implementada:ntext',
            'solucao_implementada:ntext',
            'efetividade_acao_implementada:ntext',
            'custos',
            'impacto_pedagogico:ntext',
            'atores_envolvidos',
        ],
    ]) } ?>

    <b> Similaridade calculada: <?php echo $pesquisa->similaridade; ?></b> <br><br>

    <?php if ( $pesquisa->id_titulo_problema > 0) {   ?>

        <?= GridView::widget([
        'dataProvider' => $exp_resposta,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'id_tipo_problema',
            'id_titulo_problema',
            'descricao_problema',
            'descricao_solucao',
            [
                'attribute' => 'data_ocorrencia',
                'format' => ['date', 'php:d/m/Y']
            ], 
            [
                'attribute' => 'data_insercao',
                'format' => ['date', 'php:d/m/Y']
            ], 
            'nome_especialista',
            'funcao_especialista',
            'relator',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); } ?>


    <p>
    <b>A solução recomendada ajudou na sua dúvida?</b>

          <?php $url = '?r=pesquisas/newcase&id='.$model->id_pesquisa; ?>
          
        <a href='<?php echo $url ?>' class="btn btn-primary">Sim</a>

        <?php $link = '?r=pesquisas/update&id='.$model->id_pesquisa;  ?>

        <a href='<?php echo $link ?>' class="btn btn-default">Não</a>

    </p>

</div>
