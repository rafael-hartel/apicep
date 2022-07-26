<?php

use yii\helpers\Html;
use frontend\assets\AppAsset;

/** @var yii\web\View $this */

$this->title = 'Busca CEP';
?>
<div class="site-index">

    <div class="body-content">
        <div class="row">
            <div class="busca_cep col-md-6">
                <div class="institucional">
                    <br />
                    <h2>Busca Endereços</h2>

                    <br />
                    <p> Site desenvolvido por Rafael Kovalenkovas Hartel para o teste de programação. <br />
                        Ao acessar a página de busca, inserir o número CEP do endereço desejado e o site faz uma busca pelo ViaCEP, retornando os dados do endereço informado.
                    </p>

                    <br />
                    <p><?= Html::a('Clique aqui para fazer sua busca!', ['busca-cep/index'], ['class'=>'btn btn-outline-secondary']) ?></p>
                </div>
            </div>
            <div class="busca_cep col-md-6">
                <div>
                    <?= Html::img('images/Ruas.jpg', ['class'=>'imagem_decoracao']) ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 

AppAsset::register($this);