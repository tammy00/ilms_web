<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Aplicativo */

$this->title = 'Create Aplicativo';
$this->params['breadcrumbs'][] = ['label' => 'Aplicativos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aplicativo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
