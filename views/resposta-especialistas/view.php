<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\RespostaEspecialistas */

$this->title = 'Detalhes da solução';

?>

<div class="resposta-especialistas-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php if ( Yii::$app->user->identity->perfil === 'Especialista') {  ?>
    <p>
        <?= Html::a('Atualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

    </p>
    <?php }  ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_tipo_problema',
            'id_titulo_problema',
            'descricao_problema',
            'descricao_solucao',
            'data_ocorrencia',
            'data_insercao',
            'nome_especialista',
            'relator',
        ],
    ]) ?>

    <b>A solução recomendada ajudou na sua dúvida?</b>

          
          
        <a href='#' class="btn btn-primary">Sim</a>


        <a href='#' class="btn btn-default">Não</a>

    </p>

</div>
