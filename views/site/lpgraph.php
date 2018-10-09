<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Descricao */

/** view da pesquisa geral  **/

$this->title = 'Grafo de Linha de Aprendizagem';
$this->params['breadcrumbs'][] = ['label' => 'Dados do Ambiente Virtual', 'url' => ['vlesearch']];
$this->params['breadcrumbs'][] = $this->title;


?>
<div >

    <h1><?= Html::encode($this->title) ?></h1>

    <p>Curso: <?php echo $model->curso ?>	<br>
       Disciplina: <?php echo $model->disciplina ?>	<br>	
       Período: <?php echo $model->ano_periodo ?> <br>
       Polo: <?php echo $model->polo ?> <br>
       Total de Alunos: <?php echo $model->total_alunos ?> <br>  </p><br>



    <?php  $legenda = Url::base().'/graphs/legenda.png' ?>

        <img alt='Legenda' src=<?php echo $legenda ?> > <br><br>


    
    <?php  
    	//$url = Url::base().'/graphs/' .$model->nome_figura. '.png';

        $aux = 1;
        
        $filecount = 0;
		chdir('C:\xampp\htdocs\ilms_web\web\graphs');
        $arquivos = glob($model->nome_figura."*");
        
        //echo '<br>'.var_dump($arquivos).'<br>';
        
                 foreach ( $arquivos as $a)
        {
        	$figura = Url::base().'/graphs/' .$model->nome_figura.'_'.$aux.'.png';

        	echo '<img alt='. $model->nome_figura .' src='.$figura.' > <br><br>';

        	$aux++;
        }     
/*
                foreach ( $arquivos as $a)
        {
          $filecount++;
        }
          echo '<br>'.$filecount.'<br>';  */

    ?>

<br>
    <?php echo $model->descricao ?>    


</div>
