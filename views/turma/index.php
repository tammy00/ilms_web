<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TurmaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Turmas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="turma-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Turma', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_turma',
            'sigla',
            'qtde_alunos',
            'outras_caracteristicas:ntext',
            'observacoes:ntext',
            // 'aplicativo_movel',
            // 'id_polo',
            // 'id_curso',
            // 'id_tutor',
            // 'id_aplicativo',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
