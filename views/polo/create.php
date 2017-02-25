<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Polo */

$this->title = 'Create Polo';
$this->params['breadcrumbs'][] = ['label' => 'Polos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="polo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
