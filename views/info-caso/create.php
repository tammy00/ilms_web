<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\InfoCaso */

$this->title = 'Create Info Caso';
$this->params['breadcrumbs'][] = ['label' => 'Info Casos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="info-caso-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
