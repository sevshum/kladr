<?php

/* @var $this yii\web\View */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields:</p>

    <?php $form = ActiveForm::begin([
        'id' => 'kladr-form',
        'options' => ['class' => 'form-horizontal'],
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-11\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>
    <div class="row">
        <div class="col-md-9">
            <?= $form->field($model, 'address')->textInput(['autofocus' => true]) ?>
        </div>
        <div class="col-md-3">
            <?= Html::submitButton('Найти', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
        </div>
    </div>


    <?php ActiveForm::end(); ?>

    <div class="col-lg-offset-1" style="color:#999;">
        <?= Html::encode($res) ?>
    </div>

    <div>
        <h2>Последние <?= \app\models\Request::LAST_REQ_LIMIT ?> запросов</h2>
        <ul>
            <?php foreach(\app\models\Request::getLastRequestsWithScores() as $address => $score): ?>
                <li>
                    <?= Html::encode($address) ?> <span class="badge"> <?= Html::encode($score) ?> </span>
                    <?= Html::a('Ссылка', ['site/list', 'id' => Html::encode($address)]) ?>
                </li>
            <?php endforeach; ?>
        </ul>

    </div>
</div>

</div>
