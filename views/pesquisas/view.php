<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Pesquisas */

$this->title = 'Detalhes da busca';
$this->params['breadcrumbs'][] = ['label' => 'Pesquisas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pesquisas-view">

    <h1><?= Html::encode($this->title) ?></h1>


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

</div>
