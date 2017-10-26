<?php

namespace coder\test\controllers;

use coder\test\models\Blud_Ing;
use Yii;
use coder\test\models\Blud;
use coder\test\models\SearchBlud;
use yii\db\Exception;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BludController implements the CRUD actions for Blud model.
 */
class BludController extends Controller
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
                    'delete' => ['get'],
                ],
            ],
        ];
    }

    /**
     * Lists all Blud models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SearchBlud();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Blud model.
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
     * Creates a new Blud model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Blud();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $ing = Yii::$app->request->post('ing');
            foreach($ing as $v){
                $blud_ing = new Blud_Ing();
                $blud_ing->id_blud = $model->id;
                $blud_ing->id_ing = $v;
                try{
                   $blud_ing->save();
                }catch(Exception $e){
                    var_dump($e);
                }
            }

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Blud model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Blud_Ing::deleteAll('id_blud = :id_blud',[':id_blud'=>$model->id]);
            $ing = Yii::$app->request->post('ing');
            foreach($ing as $v){
                $blud_ing = new Blud_Ing();
                $blud_ing->id_blud = $model->id;
                $blud_ing->id_ing = $v;
                try{
                    $blud_ing->save();
                }catch(Exception $e){
                    var_dump($e);
                }
            }

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Blud model.
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
     * Finds the Blud model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Blud the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Blud::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
