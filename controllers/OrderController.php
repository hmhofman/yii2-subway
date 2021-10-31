<?php

namespace app\controllers;

use app\models\subway\Order;
use app\models\subway\Meal;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * OrderController implements the CRUD actions for Order model.
 */
class OrderController extends Controller
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
     * Lists all Order models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Order::find(),
            /*
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'meal' => SORT_DESC,
                    'user' => SORT_DESC,
                ]
            ],
            */
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'meal' => Meal::find()->where(['closed_at' => null])->one()
        ]);
    }

    /**
     * Displays a single Order model.
     * @param int $meal Meal
     * @param int $user User
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($meal_id, $user_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($meal_id, $user_id),
        ]);
    }

    /**
     * Creates a new Order model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Order();
        if (!Yii::$app->user->identity) {
            Yii::$app->response->redirect('/index.php?r=site/login');
        } else {

            if ($this->request->isPost) {
                if ($model->load($this->request->post()) && $model->save()) {
                    return $this->redirect(['view', 'meal' => $model->meal_id, 'user' => $model->user_id]);
                }
            } else {
                $model->loadDefaultValues();
            }

            return $this->render('create', [
                'model' => $model,
                'meal' => Meal::find()->where(['closed_at' => null])->one()
            ]);
        }
    }

    /**
     * Updates an existing Order model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $meal Meal
     * @param int $user User
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($meal_id, $user_id)
    {
        $model = $this->findModel($meal_id, $user_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'meal_id' => $model->meal_id, 'user_id' => $model->user_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Order model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $meal Meal
     * @param int $user User
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($meal_id, $user_id)
    {
        $this->findModel($meal_id, $user_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Order model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $meal Meal
     * @param int $user User
     * @return Order the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($meal_id, $user_id)
    {
        if (($model = Order::findOne(['meal_id' => $meal_id, 'user_id' => $user_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
