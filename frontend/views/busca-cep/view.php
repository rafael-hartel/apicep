<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Endereco */

$this->title = $model->id_endereco;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Enderecos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="endereco-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id_endereco' => $model->id_endereco], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id_endereco' => $model->id_endereco], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'cep',
            'logradouro',
            'id_endereco',
            'cidade',
            'uf',
            'bairro',
            'complemento',
            'siafi',
            'ibge',
        ],
    ]) ?>

</div>
