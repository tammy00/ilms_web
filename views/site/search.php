<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Busca de solução';
$this->params['breadcrumbs'][] = $this->title;
?>
<div >
    <h1><?= Html::encode($this->title) ?></h1>

   

        <!--<div class="row">  -->
            <div class="col-xs-6 col-md-10"> <!-- class="col-lg-5" -->

                <?php $form = ActiveForm::begin(); ?>

            <div class="row">
              
              <div class="form-group col-md-3">
                <label for="naturezaProblema">Natureza do Problema</label>
                <input type="text" class="form-control" required="required" id="naturezaProblema" name="naturezaProblema" placeholder="Ex.: infraestrutura, pedagógico">
              </div>

              <div class="form-group col-md-3">
                <label for="exampleInputEmail1">Relator</label>
                <input type="text" class="form-control" required="required" id="relator" name="relator" placeholder="Ex.: Coordenador de curso, de polo, tutor, professor">     
              </div>
              
                <div class="form-group col-md-3">
                  <label for="palavrasChavesProblema">Palavras-Chaves do Problema</label>
                  <input type="text" class="form-control" required="required" id="palavrasChavesProblema" name="palavrasChavesProblema" placeholder="Ex.: problemas de internet, deficiência em informática...)">
                </div>           
                
                 <div class="form-group col-md-3">
                    <label for="polo">Polo(s)</label>
                    <input type="text" class="form-control" required="required" id="polo" name="polo" placeholder="Ex.: Brasiléia, Acrelândia, Tefé ">
                  </div>

            </div>
            <div class="row">
              
              <div class="form-group col-md-3">
                <label for="exampleInputEmail1">Curso</label>
                <input type="text" class="form-control" required="required" id="curso" name="curso" placeholder="Ex.: Administração, Educação Física">
              </div>

              <div class="form-group col-md-3">
                <label for="disciplina">Disciplina</label>
                <input type="text" class="form-control" required="required" id="disciplina" name="disciplina" placeholder="Ex.: Informática Básica, Cálculo">       
              </div>
              
              <div class="form-group col-md-3">
                <label for="turma">Turma</label>
                <input type="text" class="form-control" required="required" id="turma" name="turma" >
              </div>

              <div class="form-group col-md-3">
                <label for="qtdeAlunos">Quantidade de Alunos</label>
                <input type="text" class="form-control" required="required" id="qtdeAlunos" name="qtdeAlunos">      
              </div>
              
                     
            </div>  
            
            <div class="row">        
                <div class="form-group col-md-6">
                    <label for="problema">Resumo</label>
                    <textarea  type="text" class="form-control" required="required" id="problema" name="problema" placeholder="Descreva o problema em poucas palavras..." rows="2" cols="10"></textarea>
                    <!--<input type="text" class="form-control" required="required" id="problema" name="problema" placeholder="Descreva o problema em poucas palavras...">-->
                </div>
                <div class="form-group col-md-6">
                    <label for="descricaoProblema">Descrição do Problema</label>
                    <textarea type="text" class="form-control" required="required" id="descricaoProblema" name="descricaoProblema" placeholder="Descreva em detalhes..." rows="2" cols="10"></textarea>
                    <!--<input type="text" class="form-control" required="required" id="descricaoProblema" name="descricaoProblema" placeholder="Descreva em detalhes...">-->
                </div>  
            </div>





                    <div class="form-group">
                        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                    </div>

                <?php ActiveForm::end(); ?>

            </div>
        <!--</div>-->

</div>
