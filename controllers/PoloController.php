<?php

namespace app\controllers;

use Yii;
use app\models\Polo;
use app\models\PoloSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PoloController implements the CRUD actions for Polo model.
 */
class PoloController extends Controller
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
     * Lists all Polo models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PoloSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Polo model.
     * @param string $coordenador
     * @param string $tipo_conexao
     * @param string $infra_laboratorio
     * @param string $infra_fisica
     * @param string $infra_cidade
     * @param string $acesso
     * @return mixed
     */
    public function actionView($coordenador, $tipo_conexao, $infra_laboratorio, $infra_fisica, $infra_cidade, $acesso)
    {
        return $this->render('view', [
            'model' => $this->findModel($coordenador, $tipo_conexao, $infra_laboratorio, $infra_fisica, $infra_cidade, $acesso),
        ]);
    }

    /**
     * Creates a new Polo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Polo();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'coordenador' => $model->coordenador, 'tipo_conexao' => $model->tipo_conexao, 'infra_laboratorio' => $model->infra_laboratorio, 'infra_fisica' => $model->infra_fisica, 'infra_cidade' => $model->infra_cidade, 'acesso' => $model->acesso]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Polo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $coordenador
     * @param string $tipo_conexao
     * @param string $infra_laboratorio
     * @param string $infra_fisica
     * @param string $infra_cidade
     * @param string $acesso
     * @return mixed
     */
    public function actionUpdate($coordenador, $tipo_conexao, $infra_laboratorio, $infra_fisica, $infra_cidade, $acesso)
    {
        $model = $this->findModel($coordenador, $tipo_conexao, $infra_laboratorio, $infra_fisica, $infra_cidade, $acesso);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'coordenador' => $model->coordenador, 'tipo_conexao' => $model->tipo_conexao, 'infra_laboratorio' => $model->infra_laboratorio, 'infra_fisica' => $model->infra_fisica, 'infra_cidade' => $model->infra_cidade, 'acesso' => $model->acesso]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Polo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $coordenador
     * @param string $tipo_conexao
     * @param string $infra_laboratorio
     * @param string $infra_fisica
     * @param string $infra_cidade
     * @param string $acesso
     * @return mixed
     */
    public function actionDelete($coordenador, $tipo_conexao, $infra_laboratorio, $infra_fisica, $infra_cidade, $acesso)
    {
        $this->findModel($coordenador, $tipo_conexao, $infra_laboratorio, $infra_fisica, $infra_cidade, $acesso)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Polo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $coordenador
     * @param string $tipo_conexao
     * @param string $infra_laboratorio
     * @param string $infra_fisica
     * @param string $infra_cidade
     * @param string $acesso
     * @return Polo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($coordenador, $tipo_conexao, $infra_laboratorio, $infra_fisica, $infra_cidade, $acesso)
    {
        if (($model = Polo::findOne(['coordenador' => $coordenador, 'tipo_conexao' => $tipo_conexao, 'infra_laboratorio' => $infra_laboratorio, 'infra_fisica' => $infra_fisica, 'infra_cidade' => $infra_cidade, 'acesso' => $acesso])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
