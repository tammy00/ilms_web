<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Pesquisas */

$this->title = 'Detalhes da busca';
?>
<div class="pesquisas-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (($model != null ) && ($sol != null))  {  ?>

    <b> DESCRIÇÃO REALIZADA: </b>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_usuario',
            'id_polo',
            'relator',
            'natureza_problema:ntext',
            'descricao_problema:ntext',
            'problema_detalhado:ntext',
            'palavras_chaves',
            
        ],
    ]) ?>

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
    ]) ?>

    <b> Similaridade</b> calculada: <b><?php echo $model->similaridade; ?>%</b> <br><br>
    <?php } ?>


    <?php if ($exp_resposta != null )  {  ?>
    <?= DetailView::widget([
        'model' => $exp_resposta,
        'attributes' => [
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
        ],
    ]) ?>
    <?php } ?>

</div>
