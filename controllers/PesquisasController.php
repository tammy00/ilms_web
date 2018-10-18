<?php

namespace app\controllers;

use Yii;
use app\models\Pesquisas;
use app\models\PesquisasSearch;
use app\models\DescricaoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Descricao;
use app\models\Relator;
use app\models\Polo;
use app\models\Solucao;
use app\models\InfoCaso;
use app\models\RespostaEspecialistas;
use app\models\TipoProblema;
use app\models\TituloProblema;
use yii\filters\AccessControl;
/**
 * PesquisasController implements the CRUD actions for Pesquisas model.
 */
class PesquisasController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'view', 'create', 'update', 'delete', 'allcases', 'newcase', 'allsearches', 'casedetail'],
                'rules' => [
                    [
                        'actions' => ['index', 'view', 'create', 'update', 'delete', 'allcases', 'newcase', 'allsearches', 'casedetail'],
                        'allow' => true,
                        'matchCallback' => function ($rule, $action) {
                            if (!Yii::$app->user->isGuest)
                            {
                                if ( Yii::$app->user->identity->perfil === 'Especialista' ) 
                                {
                                    return Yii::$app->user->identity->perfil == 'Especialista'; 
                                }
                                elseif ( Yii::$app->user->identity->perfil === 'Mediador/a' ) 
                                {
                                    return Yii::$app->user->identity->perfil == 'Mediador/a'; 
                                }
                            }
                        }
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Pesquisas models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PesquisasSearch();
        $dataProvider = $searchModel->searchPseudoCasos(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionAllsearches()  // Seleciona todas as pesquisas realizadas, independente do usuário
    {
        $searchModel = new PesquisasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('allsearches', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionAllcases()  // Seleciona todos os casos registrados no BC
    {
        $searchModel = new DescricaoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('allcases', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCasedetail($id)  // Mostra dados da descrição e solução do caso selecionado anteriormente
    {
        $desc = Descricao::find()->where(['id_descricao' => $id])->one(); // Acha o registro da descricao

        $sol = Solucao::find()->where(['id_solucao' => $desc->id_descricao])->one(); // Acha o registro da solução

        if ( $sol != null )
        {
            $polo = Polo::find()->where(['id_polo' => $desc->id_polo])->one();
            
            $desc->id_polo = $polo->nome;
            

            return $this->render('casedetail', [
                'desc' => $desc,
                'sol' => $sol,
            ]);            
        }
        else return Yii::$app->runAction('site/doom', ['message' => 'Solução do caso selecionado não encontrada. Por favor, entrar em contato com o Administrador.']); 
        // actioDoom 'Solução do caso selecionado não encontrada. Por favor, entrar em contato com o Administrador.'


    }

    /**
     * Displays a single Pesquisas model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = Pesquisas::find()->where(['id_pesquisa' => $id])->one();

        if ( $model->id_solucao != null ){
            $sol = Solucao::find()->where(['id_solucao' => $model->id_solucao])->one();
            $model->similaridade = round(($model->similaridade * 100 ));
        }
        else $sol = null;

        $polo = Polo::find()->where(['id_polo' => $model->id_polo])->one();
        $model->id_polo = $polo->nome;

        $model->id_usuario = Yii::$app->user->identity->perfil . ' ('.Yii::$app->user->identity->email.')';
        
        if ( ($model->id_resposta > 0) || ($model->id_resposta != null) ) // Verifica se, na mesma pesquisa, tem registro de pesquisa à opinião de especialistas
        {
            $exp_resposta = RespostaEspecialistas::find()->where(['id_resposta' => $model->id_resposta])->one();
            $tipoproblema = TipoProblema::find()->where(['id' => $exp_resposta->id_tipo_problema])->one();
            $exp_resposta->id_tipo_problema = $tipoproblema->tipo;
            $tituloproblema = TituloProblema::find()->where(['id' => $exp_resposta->id_titulo_problema])->one();
            $exp_resposta->id_titulo_problema = $tituloproblema->titulo;

        }  
        else $exp_resposta = null;  

        return $this->render('view', [
            'model' => $model,
            'sol' => $sol,
            'exp_resposta' => $exp_resposta,
            'id' => $id,
        ]);
    }

    /**
     * Creates a new Pesquisas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Pesquisas();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_pesquisa]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Pesquisas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)  // Só atualiza o status para 1 -> não vira um novo caso
    {
        $model = $this->findModel($id);

        $model->status = 1; // Foi decidido que não vira um novo caso
        //$model->efetividade_acao_implementada = "Não";

        $model->save();

        Yii::$app->session->setFlash('casesaved');
        return Yii::$app->runAction('site/index');
    }


    public function actionNewcase($id, $evento)  // Registra um novo caso RBC no banco
    {
        $model = $this->findModel($id);

        $valor_retorno = (-10);

        if ( $model->id_solucao != null ) // caso RBC
        {
            $valor_retorno = $this->salva_rbc($id, $model->id_solucao);

            switch ($valor_retorno)
            {
                 //case 1: 
                     //return Yii::$app->runAction('site/index', ['mensagem_sim' => 'Caso salvo na base.']);
                     //break;
                 case 2: 
                     return Yii::$app->runAction('site/index', ['mensagem_nao' => 'InfoCaso do caso novo não foi salvo.']);
                     break;
                 case 3: 
                     return Yii::$app->runAction('site/index', ['mensagem_nao' => 'Solução do caso novo não foi salvo.']);
                     break;
                 case 4: 
                     return Yii::$app->runAction('site/index', ['mensagem_nao' => 'Descrição do caso novo não foi salvo.']);
                     break;
                default:
                    break; 
            }
        }

        if ( $model->id_resposta != null ) // caso Opinião de Especialista
        {
            $resposta_info = RespostaEspecialistas::find()->where(['id' => $model->id_resposta])->one();

            $nova_opiniao = new RespostaEspecialistas();

            $nova_opiniao->descricao_problema = $model->descricao_problema;

            $nova_opiniao->id_titulo_problema = $resposta_info->id_titulo_problema;
            $nova_opiniao->id_tipo_problema =  $resposta_info->id_tipo_problema;

            $nova_opiniao->data_ocorrencia = $resposta_info->data_ocorrencia;

            $nova_opiniao->nome_especialista = $resposta_info->nome_especialista;

            $nova_opiniao->data_insercao = date('Y-m-d');

            if ( $model->id_solucao != null ) {
                $solucao_info = Solucao::find()->where(['id_solucao' => $model->id_solucao])->one();
                $nova_opiniao->descricao_solucao = $solucao_info->solucao;
            }
            else $nova_opiniao->descricao_solucao = '';

            $relator_info = Relator::find()->where(['perfil' => $model->relator])->one();
            $nova_opiniao->relator = $relator_info->id_relator;

            if ( $nova_opiniao->save()) return Yii::$app->runAction('site/index', ['mensagem_sim' => 'Casos salvos.']);
            else Yii::$app->runAction('site/index', ['mensagem_nao' => 'Os casos não foram salvos.']);
        }

    }

    protected function salva_rbc($id, $id_solucao)
    {
        $model = $this->findModel($id);

            $solucao = Solucao::find()->where(['id_solucao' => $model->id_solucao])->one();

            $nova_descricao = new Descricao();
            $nova_descricao->natureza_problema = $model->natureza_problema;
            $nova_descricao->palavras_chaves = $model->palavras_chaves;
            $nova_descricao->relator = $model->relator;
            $nova_descricao->id_polo = $model->id_polo;
            $nova_descricao->descricao_problema = $model->descricao_problema;
            $nova_descricao->problema_detalhado = $model->problema_detalhado;

            if ( $nova_descricao->save() )  // Se salvar a descricao do caso novo
            {
                $nova_solucao = new Solucao();
                $nova_solucao->solucao = $solucao->solucao;
                $nova_solucao->palavras_chaves = $solucao->palavras_chaves;
                $nova_solucao->acao_implementada = $solucao->acao_implementada;
                $nova_solucao->solucao_implementada = $solucao->solucao_implementada;
                $nova_solucao->efetividade_acao_implementada = $solucao->efetividade_acao_implementada;
                $nova_solucao->custos = $solucao->custos;
                $nova_solucao->impacto_pedagogico = $solucao->impacto_pedagogico;
                $nova_solucao->atores_envolvidos = $solucao->atores_envolvidos;

                if ( $nova_solucao->save() )  // Se salvar a solução do novo caso
                {
                    $relator = Relator::find()->where(['perfil' => $model->relator])->one();
                    $polo = Polo::find()->where(['id_polo' => $model->id_polo])->one();
                    $novo = new InfoCaso();
                    $novo->id_descricao = $nova_descricao->id_descricao;
                    $novo->tipo_caso = 'Tipo Caso';
                    $novo->polo = $polo->nome;
                    $novo->quantidade_alunos = 40; // MUDAR ISSO
                    $novo->date_created = date('Y-m-d');
                    $novo->id_relator = $relator->id_relator;

                    if ( $novo->save() ) // Se o info_caso foi salvo
                    {
                        $model->status = 2;  // É um caso novo na base - só para diferenciar na tabela pesquisas
                        $model->save();


                        return 1;
                    }
                    else return 2;
                }
                else return 3;
            }
            else return 4;
    }

    /**
     * Deletes an existing Pesquisas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionUpdateanswer($id, $resposta)  // Atualiza o registro de pesquisa realizada - se a suguestão ajudou ou não
    {
        $model = $this->findModel($id);

        $model->status = $resposta; // Foi decidido que não vira um novo caso
        //$model->efetividade_acao_implementada = "Não";

        $model->save();

        //Yii::$app->session->setFlash('casesaved');
        return Yii::$app->runAction('site/index');
    }

    /**
     * Finds the Pesquisas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Pesquisas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pesquisas::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('A página requisitada não existe.');
        }
    }
}
