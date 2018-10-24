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

$this->title = 'Resultado da busca'

?>
<div class="descricao-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <a href="?r=site/cbrsearch" class="btn btn-default">Voltar</a>

    <?php if ( $pesquisa->relator != null ) {   ?>


            <b> <h4>PROBLEMA DESCRITO:</h4> </b>
            <?php 
                if (($pesquisa->descricao_problema != null) || ($pesquisa->descricao_problema != "")) 
                {
                    echo '<b>Descrição resumida:</b> '.$pesquisa->descricao_problema.'<br>';
                }

                if (($pesquisa->natureza_problema != null) || ($pesquisa->natureza_problema != "")) 
                {
                    echo '<b>Natureza do Problema:</b> '.$pesquisa->natureza_problema.'<br>';
                }

                if (($pesquisa->palavras_chaves != null) || ($pesquisa->palavras_chaves != "")) 
                {
                    echo '<b>Palavras-chaves:</b> '.$pesquisa->palavras_chaves.'<br>';
                }

                if (($pesquisa->relator != null) || ($pesquisa->relator != "")) 
                {
                    echo '<b>Função do Relator:</b> '.$pesquisa->relator.'<br>';
                }


                if (($pesquisa->id_polo != null) || ($pesquisa->id_polo != "")) 
                {
                    echo '<b>Polo:</b> '.$pesquisa->id_polo.'<br>';
                }



            
            ?>
    <?php }   ?>

<br>
        <?php if ( $sol != null ) {   ?>
    <fieldset>
        <legend>Solução sugerida</legend>
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
