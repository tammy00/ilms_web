<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DisciplinaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Disciplinas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="disciplina-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Disciplina', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_disciplina',
            'nome',
            'departamento',
            'observacoes:ntext',
            'outras_caracteristicas:ntext',
            // 'id_curso',
            // 'id_professor',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
