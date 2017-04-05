<?php

namespace app\controllers;

use Yii;
use app\models\Pesquisas;
use app\models\PesquisasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Descricao;
use app\models\Solucao;
use app\models\InfoCaso;
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
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pesquisas model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
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

        $model->save();

        Yii::$app->session->setFlash('casesaved');
        return Yii::$app->runAction('site/index');
    }


    public function actionNewcase($id)  // Registra um novo caso no banco
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
            $nova_solucao->atores_involvidos = $solucao->atores_involvidos;

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
                    Yii::$app->session->setFlash('newcasesaved');
                    return Yii::$app->runAction('site/index');
                }
                else return Yii::$app->runAction('site/index', ['message' => 'InfoCaso do caso novo não foi salvo.']);
            }
            else return Yii::$app->runAction('site/index', ['message' => 'Solução do caso novo não foi salvo.']);
        }
        else return Yii::$app->runAction('site/index', ['message' => 'Descrição do caso novo não foi salvo.']);
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
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
