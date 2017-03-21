<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Relator */

$this->title = 'Update Relator: ' . $model->id_relator;
$this->params['breadcrumbs'][] = ['label' => 'Relators', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_relator, 'url' => ['view', 'id' => $model->id_relator]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="relator-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
