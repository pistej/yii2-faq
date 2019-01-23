<?php

namespace pistej\faq\controllers;

use pistej\faq\Faq;
use pistej\faq\models\FaqQa;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * QaController implements the CRUD actions for FaqQa model.
 */
class QaController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors(): array
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    // allow authenticated users
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ]
                ]
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all FaqQa models.
     * @return string
     */
    public function actionIndex(): string
    {
        $dataProvider = new ActiveDataProvider([
            'query' => FaqQa::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single FaqQa model.
     *
     * @param integer $id
     *
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id): string
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new FaqQa model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new FaqQa();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->cache->delete($model->lang_code . '/' . $model->group->key);

            return $this->redirect([
                'view',
                'id' => $model->id,
            ]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing FaqQa model.
     * If update is successful, the browser will be redirected to the 'view' page.
     *
     * @param integer $id
     *
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        //create old cache key before update
        $oldCacheKey = $model->lang_code . '/' . $model->group->key;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->cache->delete($oldCacheKey);
            Yii::$app->cache->delete($model->lang_code . '/' . $model->group->key);

            return $this->redirect([
                'view',
                'id' => $model->id,
            ]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing FaqQa model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     *
     * @param integer $id
     *
     * @return \yii\web\Response
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     * @throws \yii\web\NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id): \yii\web\Response
    {
        $model = $this->findModel($id);
        Yii::$app->cache->delete($model->lang_code . '/' . $model->group->key);
        $model->delete();
        Yii::$app->session->addFlash('success', Faq::t('app', 'Item deletion successful.'));

        return $this->redirect(['index']);
    }

    /**
     * Finds the FaqQa model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param integer $id
     *
     * @return FaqQa the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id): FaqQa
    {
        if (($model = FaqQa::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
