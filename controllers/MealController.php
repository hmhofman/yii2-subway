<?php

namespace app\controllers;

use app\models\subway\Meal;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MealController implements the CRUD actions for Meal model.
 */
class MealController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Meal models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Meal::find(),
            /*
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ]
            ],
            */
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Meal model.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Meal model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Meal();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $this->sanitize($model) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    private function sanitize(&$model)
    {
        if ($model->date ) {
            $model->date = (new \DateTime($model->date))->format('Y-m-d');
            //$model->date = new \DateTime($model->date);
        }
        if ($model->opened_by && !$model->opened_at) {
            $model->opened_at = new DateTime();
        }
        if (!$model->opened_by && $model->opened_at) {
            $model->opened_by = Yii::$app->user->id;
        }
        if ($model->closed_by && !$model->closed_at) {
            $model->closed_at = new DateTime();
        }
        if (!$model->closed_by && $model->closed_at) {
            $model->closed_by = Yii::$app->user->id;
        }
        if ($model->opened_at && !$model->opened_at instanceof DateTime) {
            $model->opened_at = (new \DateTime($model->opened_at))->format('Y-m-d H:i:s');
        }
        if ($model->closed_at && !$model->closed_at instanceof DateTime) {
            $model->closed_at = (new \DateTime($model->closed_at))->format('Y-m-d H:i:s');
        }
        //die('<pre>'.print_r(['$model' => $model], true));
        return true;
    }

    /**
     * Updates an existing Meal model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $this->sanitize($model) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Meal model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Meal model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Meal the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Meal::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
