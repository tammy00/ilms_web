<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Relator */

$this->title = 'Create Relator';
$this->params['breadcrumbs'][] = ['label' => 'Relators', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="relator-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
