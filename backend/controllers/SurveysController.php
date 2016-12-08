<?php

namespace backend\controllers;

use Yii;
use backend\models\Surveys;
use backend\models\SurveySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SurveysController implements the CRUD actions for Surveys model.
 */
class SurveysController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
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
     * Lists all Surveys models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new SurveySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $surveyz = new Surveys();
        $surv = $surveyz->find()->orderBy(['survey_id' => SORT_ASC])->all();

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider, 'surv' => $surv,
        ]);
    }

    /**
     * Displays a single Surveys model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Surveys model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Surveys();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate() == TRUE) {
                // print_r($model);
                $model->save();
                Yii::$app->session->setFlash('success', "Poll Created Succsesfully");

                return $this->redirect('create');
            } else {
                $sessions = Yii::$app->session->set("Error", "Error when creating Survey");
            }
            //print_r($model);
            //return $this->redirect(['view', 'id' => $model->survey_id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Surveys model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->survey_id]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    public function actionQuestion($id) {

        $mdd = new \backend\models\Xls();
        $survey = new SurveySearch();
        $name = $survey->find()->where(['survey_id' => $id])->one();
        $leadsCount = $mdd->find()->where(['survey_id' => $id])->count();
        if ($leadsCount >= 1) {
            $sessions = Yii::$app->session->setFlash("success", $name->title . " has questions set already"
            );
            return $this->redirect(['surveys/showquestions?id=' . $id]);
        }
        $model = new \backend\models\FileUpload();
        $survey = new SurveySearch();
        $name = $survey->find()->where(['survey_id' => $id])->one();
        if ($model->load(Yii::$app->request->post())) {
            $date = rand(1, 100000000000);


            $imagename = $name->title . $date;
            $model->filename = \yii\web\UploadedFile::getInstance($model, 'filename');
            $model->filename->saveAs('uploads/' . $imagename . "." . $model->filename->extension);
            $model->filename = $name->title . $date;
            $model->save();
            $this->uploadXls($model->filename, $name->survey_id);
            $sessions = Yii::$app->session->setFlash("success", "Succsesfully uploaded questions  for " . $name->title
            );


            return $this->redirect(['surveys/showquestions?id=' . $id]);
        }

        return $this->render('upload', ['model' => $model]);
    }

    public function uploadXls($filename, $survey_id) {


        $fileinput = 'uploads/' . $filename . ".xlsx";
        $survey_id = $survey_id;



        try {

            $inputfile = \PHPExcel_IOFactory::identify($fileinput);
            $objReader = \PHPExcel_IOFactory::createReader($inputfile);
            $objPHPExcel = $objReader->load($fileinput);
        } catch (Exception $e) {
            Yii::warning("failed to import xls");
        }
        //getting proper sheet
        $sheet = $objPHPExcel->getSheet(0);
        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();

        //Loop through each row of the worksheet in turn
        for ($row = 1; $row <= $highestRow; $row++) {
            //  Read a row of data into an array
            $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);
            if ($row >= 4) {
                $model = new \backend\models\Xls();



                $model->$skip = $rowData[0][6];
                // $model->save();
                $model->xls = $rowData[0][0];
                $model->name = $rowData[0][1];
                $model->qns = $rowData[0][2];
                $model->survey_id = $survey_id;
                $model->length = $rowData[0][3];
                $model->type = $rowData[0][4];
                $model->rotation = $rowData[0][5];
                $model->save();


//                foreach (explode("\n", $skip) as $x => $x_value) {
//                    $model->skip = $x_value;
//                    print $model->skip;
//                    die();
//                    // $model->save();
//                }
                //  $tags = explode("\n", $skip);
//                foreach ($tags as $t) :
//
//                    
//
//                    $model->id = NULL; //primary key(auto increment id) id
//                    $model->isNewRecord = true;
//                     $model->skip = $t;
//
//                    $model->save(); //yii2
//
//                    $model->save(); //yii2
//                    //unset($model);
//
//                endforeach;
                // die();
            }
//           
        }
    }

    public function actionShowquestions($id) {
        $mdd = new \backend\models\Xls();
        $model = $mdd->find()->where(['survey_id' => $id])->orderBy(['id' => SORT_DESC])->all();

        //print_r($model);
        return $this->render('question', ['model' => $model]);
    }

    public function actionCqns($sid, $id) { {
            $model = $this->Gtqns($id);
            $responses = new \backend\models\Responses();
            $rmodel = $responses->find()->where(['xls_id' => $id])->orderBy(['id' => SORT_DESC])->all();
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                //  return $this->redirect(['surveys/showquestions?id='.$id]);
                return $this->redirect(['question', 'id' => $model->survey_id]);
            } else {
                    return $this->render('eqns', ['model' => $model,'rmodel' => $rmodel]);
            }
        }
    }

    public function Gtqns($id) {

        if (($model = \backend\models\Xls::find()->where(['id' => $id])->one()) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Deletes an existing Surveys model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Surveys model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Surveys the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Surveys::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
