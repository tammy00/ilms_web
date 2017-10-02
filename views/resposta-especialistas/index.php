<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RespostaEspecialistasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Resposta Especialistas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="resposta-especialistas-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Resposta Especialistas', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_tipo_problema',
            'id_titulo_problema',
            'descricao_problema',
            'descricao_solucao',
            // 'data_ocorrencia',
            // 'data_insercao',
            // 'nome_especialista',
            // 'funcao_especialista',
            // 'relator',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
