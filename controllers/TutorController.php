<?php

namespace app\controllers;

use Yii;
use app\models\Tutor;
use app\models\TutorSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TutorController implements the CRUD actions for Tutor model.
 */
class TutorController extends Controller
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
     * Lists all Tutor models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TutorSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tutor model.
     * @param string $nome
     * @param string $tipo_tutoria
     * @param string $tipo_bolsa
     * @param string $polo_id
     * @return mixed
     */
    public function actionView($nome, $tipo_tutoria, $tipo_bolsa, $polo_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($nome, $tipo_tutoria, $tipo_bolsa, $polo_id),
        ]);
    }

    /**
     * Creates a new Tutor model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Tutor();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'nome' => $model->nome, 'tipo_tutoria' => $model->tipo_tutoria, 'tipo_bolsa' => $model->tipo_bolsa, 'polo_id' => $model->polo_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Tutor model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $nome
     * @param string $tipo_tutoria
     * @param string $tipo_bolsa
     * @param string $polo_id
     * @return mixed
     */
    public function actionUpdate($nome, $tipo_tutoria, $tipo_bolsa, $polo_id)
    {
        $model = $this->findModel($nome, $tipo_tutoria, $tipo_bolsa, $polo_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'nome' => $model->nome, 'tipo_tutoria' => $model->tipo_tutoria, 'tipo_bolsa' => $model->tipo_bolsa, 'polo_id' => $model->polo_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Tutor model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $nome
     * @param string $tipo_tutoria
     * @param string $tipo_bolsa
     * @param string $polo_id
     * @return mixed
     */
    public function actionDelete($nome, $tipo_tutoria, $tipo_bolsa, $polo_id)
    {
        $this->findModel($nome, $tipo_tutoria, $tipo_bolsa, $polo_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Tutor model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $nome
     * @param string $tipo_tutoria
     * @param string $tipo_bolsa
     * @param string $polo_id
     * @return Tutor the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($nome, $tipo_tutoria, $tipo_bolsa, $polo_id)
    {
        if (($model = Tutor::findOne(['nome' => $nome, 'tipo_tutoria' => $tipo_tutoria, 'tipo_bolsa' => $tipo_bolsa, 'polo_id' => $polo_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
