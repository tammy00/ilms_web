<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RelatorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Relators';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="relator-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Relator', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_relator',
            'perfil',
            'id_infoc',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
