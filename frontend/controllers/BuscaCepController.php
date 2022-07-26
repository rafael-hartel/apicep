<?php

namespace frontend\controllers;

use frontend\models\Endereco;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use frontend\models\services\viacep\ViacepRequest;

/**
 * BuscaCepController implements the CRUD actions for Endereco model.
 */
class BuscaCepController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
            ]
        );
    }

    /**
     * Lists all Endereco models.
     *
     * @return string
     */
    public function actionIndex()
    {
        /*$searchModel = new EnderecoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);*/

        $model = new Endereco();
        $model->setScenario('chamada_api');

        /*echo "<pre>";
        echo var_dump($this->request->isPost);
        echo "</pre>";
        echo "<pre>";
        echo var_dump($this->request->post());
        echo "</pre>";
        exit;*/

        if ($this->request->isPost && $model->load($this->request->post()) && $model->validate()) {
            $model->chamarApi();
        }

        return $this->render('index', [
            'model' => $model,
        ]);
    }

    /**
     * Displays a single Endereco model.
     * @param int $id_endereco
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_endereco)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_endereco),
        ]);
    }

    public function actionUpdate($id_endereco)
    {
        $model = $this->findModel($id_endereco);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_endereco' => $model->id_endereco]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

}
