<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Pesquisas */

$this->title = 'Create Pesquisas';
$this->params['breadcrumbs'][] = ['label' => 'Pesquisas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pesquisas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
