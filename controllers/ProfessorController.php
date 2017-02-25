<?php

namespace app\controllers;

use Yii;
use app\models\Professor;
use app\models\ProfessorSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProfessorController implements the CRUD actions for Professor model.
 */
class ProfessorController extends Controller
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
     * Lists all Professor models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProfessorSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Professor model.
     * @param string $nome
     * @param string $tipo_bolsa
     * @param string $departamento
     * @return mixed
     */
    public function actionView($nome, $tipo_bolsa, $departamento)
    {
        return $this->render('view', [
            'model' => $this->findModel($nome, $tipo_bolsa, $departamento),
        ]);
    }

    /**
     * Creates a new Professor model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Professor();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'nome' => $model->nome, 'tipo_bolsa' => $model->tipo_bolsa, 'departamento' => $model->departamento]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Professor model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $nome
     * @param string $tipo_bolsa
     * @param string $departamento
     * @return mixed
     */
    public function actionUpdate($nome, $tipo_bolsa, $departamento)
    {
        $model = $this->findModel($nome, $tipo_bolsa, $departamento);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'nome' => $model->nome, 'tipo_bolsa' => $model->tipo_bolsa, 'departamento' => $model->departamento]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Professor model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $nome
     * @param string $tipo_bolsa
     * @param string $departamento
     * @return mixed
     */
    public function actionDelete($nome, $tipo_bolsa, $departamento)
    {
        $this->findModel($nome, $tipo_bolsa, $departamento)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Professor model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $nome
     * @param string $tipo_bolsa
     * @param string $departamento
     * @return Professor the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($nome, $tipo_bolsa, $departamento)
    {
        if (($model = Professor::findOne(['nome' => $nome, 'tipo_bolsa' => $tipo_bolsa, 'departamento' => $departamento])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
