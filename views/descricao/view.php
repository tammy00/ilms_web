<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Descricao */

$this->title = $model->id_descricao;
$this->params['breadcrumbs'][] = ['label' => 'Descricaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="descricao-view">

    <h1><?= Html::encode($this->title) ?></h1>


    <?= DetailView::widget([
        'model' => $modelDescricao,
        'attributes' => [
            'natureza_problema:ntext',
            'relator',
            'descricao_problema:ntext',
            'problema_detalhado:ntext',
            'palavras_chaves',
            'id_polo',
        ],
    ]) ?>

    <?= DetailView::widget([
        'model' => $modelSolucao,
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

    <p>

    <b>A solução recomendada ajudou na sua dúvida?</b>

          <?php $url = '?r=descricao/create&id='.$modelDescricao->id_descricao.'&tema='.$tema.'&topic='.$topico.'&desc='.$des.'&natureza='.$natureza.'&estilo='.$estilo; 
        ?>
        <a href='<?php echo $url ?>' class="btn btn-primary">Sim</a>

        <?php $link = '?r=solucao-problema/didnothelp&idsol=&tema='.$tema.'&topic='.$topico.'&desc='.$des.'&natureza='.$natureza.'&estilo='.$estilo; ?>

        <a href='<?php echo $link ?>' class="btn btn-default">Não</a>

    </p>

</div>
