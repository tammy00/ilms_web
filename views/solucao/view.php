<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Solucao */

$this->title = $model->id_solucao;
$this->params['breadcrumbs'][] = ['label' => 'Solucaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="solucao-view">

    <h1><?= Html::encode($this->title) ?></h1>



    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_solucao',
            'solucao:ntext',
            'palavras_chaves',
            'acao_implementada:ntext',
            'solucao_implementada:ntext',
            'efetividade_acao_implementada:ntext',
            'custos',
            'impacto_pedagogico:ntext',
            'atores_envolvidos',
            'id_infoc',
        ],
    ]) ?>

</div>
