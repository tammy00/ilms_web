<?php

namespace app\controllers;

use Yii;
use app\models\Curso;
use app\models\CursoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CursoController implements the CRUD actions for Curso model.
 */
class CursoController extends Controller
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
     * Lists all Curso models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CursoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Curso model.
     * @param string $polo_id
     * @param string $tipo_curso
     * @param integer $duracao
     * @param string $departamento
     * @param string $coordenador
     * @return mixed
     */
    public function actionView($polo_id, $tipo_curso, $duracao, $departamento, $coordenador)
    {
        return $this->render('view', [
            'model' => $this->findModel($polo_id, $tipo_curso, $duracao, $departamento, $coordenador),
        ]);
    }

    /**
     * Creates a new Curso model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Curso();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'polo_id' => $model->polo_id, 'tipo_curso' => $model->tipo_curso, 'duracao' => $model->duracao, 'departamento' => $model->departamento, 'coordenador' => $model->coordenador]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Curso model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $polo_id
     * @param string $tipo_curso
     * @param integer $duracao
     * @param string $departamento
     * @param string $coordenador
     * @return mixed
     */
    public function actionUpdate($polo_id, $tipo_curso, $duracao, $departamento, $coordenador)
    {
        $model = $this->findModel($polo_id, $tipo_curso, $duracao, $departamento, $coordenador);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'polo_id' => $model->polo_id, 'tipo_curso' => $model->tipo_curso, 'duracao' => $model->duracao, 'departamento' => $model->departamento, 'coordenador' => $model->coordenador]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Curso model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $polo_id
     * @param string $tipo_curso
     * @param integer $duracao
     * @param string $departamento
     * @param string $coordenador
     * @return mixed
     */
    public function actionDelete($polo_id, $tipo_curso, $duracao, $departamento, $coordenador)
    {
        $this->findModel($polo_id, $tipo_curso, $duracao, $departamento, $coordenador)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Curso model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $polo_id
     * @param string $tipo_curso
     * @param integer $duracao
     * @param string $departamento
     * @param string $coordenador
     * @return Curso the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($polo_id, $tipo_curso, $duracao, $departamento, $coordenador)
    {
        if (($model = Curso::findOne(['polo_id' => $polo_id, 'tipo_curso' => $tipo_curso, 'duracao' => $duracao, 'departamento' => $departamento, 'coordenador' => $coordenador])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
