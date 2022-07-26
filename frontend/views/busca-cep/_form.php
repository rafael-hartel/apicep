<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use frontend\assets\MascaraAsset;

/* @var $this yii\web\View */
/* @var $model app\models\Endereco */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="endereco-form">
    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'cepText')->textInput(['maxlength' => true, 'class'=>'form-control cep']) ?>
        </div>

        <div class="col-md-2 align-items-center">
            <?php //Ok, gambiarra para deixar o botão na mesma altura do input, se conseguir me falar como centralizar verticalmente algo eu aceito ?>
            <?= Html::label('|', null, ['class'=>'transparent']) ?>
            <div class="form-group">
                <?= Html::submitButton(Yii::t('app', 'Buscar'), ['class' => 'btn btn-success']) ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <?= $form->field($model, 'logradouro')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'complemento')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'bairro')->textInput(['maxlength' => true]) ?>
        </div>
        
        <div class="col-md-4">
            <?= $form->field($model, 'localidade')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-md-2">
            <?= $form->field($model, 'uf')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-md-2">
            <?= $form->field($model, 'ddd')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'siafi')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-md-4">
            <?= $form->field($model, 'ibge')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-md-4">
            <?= $form->field($model, 'gia')->textInput(['maxlength' => true]) ?>
        </div>

    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php 

MascaraAsset::register($this);
