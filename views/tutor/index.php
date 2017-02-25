<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TutorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tutors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tutor-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tutor', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_matricula',
            'nome',
            'tipo_tutoria',
            'tipo_bolsa',
            'outras_caracteristicas:ntext',
            // 'observacoes:ntext',
            // 'polo_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
