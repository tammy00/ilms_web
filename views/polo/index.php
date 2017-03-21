<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PoloSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Polos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="polo-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Polo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_polo',
            'nome',
            'coordenador',
            'tipo_conexao',
            'infra_laboratorio',
            // 'infra_fisica',
            // 'infra_cidade',
            // 'acesso',
            // 'outras_caracteristicas:ntext',
            // 'id_descricao',
            // 'id_turma',
            // 'id_curso',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
