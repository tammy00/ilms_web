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

    <?php if ( $pesquisa->relator != null ) {   ?>
    <fieldset>
        <legend>Solução sugerida</legend>
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
        ]); } ?>


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
        ]); ?>

        <b> Similaridade</b> calculada: <b><?php echo $pesquisa->similaridade; ?>%</b> <br><br>
        <?php } ?>
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
