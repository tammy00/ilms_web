<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Descricao */

$this->title = 'Update Descricao: ' . $model->id_descricao;
$this->params['breadcrumbs'][] = ['label' => 'Descricaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_descricao, 'url' => ['view', 'id' => $model->id_descricao]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="descricao-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
