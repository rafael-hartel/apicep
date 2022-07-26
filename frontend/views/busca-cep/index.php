<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Endereco */

$this->title = Yii::t('app', 'Title_endereco');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="endereco-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
