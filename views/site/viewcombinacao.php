<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use app\models\TipoProblema;
use app\models\TituloProblema;
use app\models\Pesquisas;

/* @var $this yii\web\View */
/* @var $model app\models\Descricao */

/** view da pesquisa geral  **/

$this->title = 'Resultado(s) da busca'

?>
<div class="descricao-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php if ( $model_descricao != null ) {   ?>
    <fieldset>
        <legend>Solução do RBC</legend>
        <b> DESCRIÇÃO REALIZADA: </b>
        <?= DetailView::widget([
            'model' => $$model_descricao,
            'attributes' => [
                'natureza_problema:ntext',
                'palavras_chaves',
            ],
        ]); } ?>


        <?php if ( $model_solucao != null ) {   ?>

        <b> SOLUÇÃO APRESENTADA: </b>
        <?= DetailView::widget([
            'model' => $model_solucao,
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
        ]); ?>

        <?php } ?>
    </fieldset>


    <?php if ( $model_esp != null ) {   ?>
    <br><br>
    <fieldset>
            <legend>Opinião do Especialista</legend>
            <?= DetailView::widget([
                'model' => $model_esp,
                'attributes' => [
                    'id_tipo_problema',
                    'id_titulo_problema',
                    'descricao_problema',
                    'descricao_solucao',
                    'data_ocorrencia',
                    'data_insercao',
                    'nome_especialista',
                    'funcao_especialista',
                    'relator',
                ],
            ]) ?>

    <?= } ?>
    </fieldset>
    <br>

    <?php if ( $model_ava != null ) {   ?>
    <br><br>
    <fieldset>
            <legend>Pesquisa no AVA</legend>


    <?= } ?>
    </fieldset>
    <br>

    <p>
    <b>A informação é útil?</b>

          <?php $url = '#'.$model_descricao->id_pesquisa; ?>
          
        <a href='<?php echo $url ?>' class="btn btn-primary">Sim</a>

        <?php $link = '#'.$model_descricao->id_pesquisa;  ?>

        <a href='<?php echo $link ?>' class="btn btn-default">Não</a>

    </p>

</div>
