<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TituloProblemaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Titulo Problemas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="titulo-problema-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Titulo Problema', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'titulo',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
