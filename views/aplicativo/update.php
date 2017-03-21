<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Aplicativo */

$this->title = 'Update Aplicativo: ' . $model->id_aplicativo;
$this->params['breadcrumbs'][] = ['label' => 'Aplicativos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_aplicativo, 'url' => ['view', 'id' => $model->id_aplicativo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="aplicativo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
