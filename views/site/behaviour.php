<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Descricao */

/** view da pesquisa geral  **/

$this->title = 'Monitor de Comportamento';

?>
<div >

    <h1><?= Html::encode($this->title) ?></h1>

    <a href="?r=site/vlesearch" class="btn btn-default">Voltar</a>

    <p>Curso: <?php echo $model->curso ?>	<br>
       Disciplina: <?php echo $model->disciplina ?>	<br>	
       Período: <?php echo $model->ano_periodo ?> <br>
       Polo: <?php echo $model->polo ?> <br>
       Total de Alunos: <?php echo $model->total_alunos ?> <br>  </p><br>

    <?php $url = Url::base().'/graphs/'.$model->nome_figura.'.png' ?>

     <img alt=<?php echo $model->nome_figura ?> src=<?php echo $url?> > <br>

</div>
