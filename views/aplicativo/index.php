<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AplicativoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Aplicativos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aplicativo-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Aplicativo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_aplicativo',
            'nome',
            'observacoes:ntext',
            'id_turma',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
