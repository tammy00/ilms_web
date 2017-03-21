<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\InfoCasoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Info Casos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="info-caso-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Info Caso', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_infoc',
            'date_created',
            'tipo_caso',
            'quantidade_alunos',
            'polo',
            // 'id_descricao',
            // 'id_relator',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
