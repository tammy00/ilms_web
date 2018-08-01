<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Pesquisas */

$this->title = 'Caso nº'.$desc->id_descricao;
?>
<div class="pesquisas-view">

    <h1><?= Html::encode($this->title) ?></h1>


    <b> DESCRIÇÃO do Problema: </b>
    <?= DetailView::widget([
        'model' => $desc,
        'attributes' => [
            'id_polo',
            'relator',
            'natureza_problema:ntext',
            'descricao_problema:ntext',
            'problema_detalhado:ntext',
            'palavras_chaves',
        ],
    ]); ?>

    <b> SOLUÇÃO do Problema: </b>
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


    <?php {} ?>

</div>
