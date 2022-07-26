<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EnderecoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="endereco-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'cep') ?>

    <?= $form->field($model, 'logradouro') ?>

    <?= $form->field($model, 'id_endereco') ?>

    <?= $form->field($model, 'cidade') ?>

    <?= $form->field($model, 'uf') ?>

    <?php // echo $form->field($model, 'bairro') ?>

    <?php // echo $form->field($model, 'complemento') ?>

    <?php // echo $form->field($model, 'siafi') ?>

    <?php // echo $form->field($model, 'ibge') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
