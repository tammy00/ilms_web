<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Polo */

$this->title = 'Update Polo: ' . $model->id_polo;
$this->params['breadcrumbs'][] = ['label' => 'Polos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_polo, 'url' => ['view', 'id' => $model->id_polo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="polo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
