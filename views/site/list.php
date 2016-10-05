<?php

/* @var $this yii\web\View */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$this->title = $model->address;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-index">

    <h1><?= Html::encode($this->title) ?></h1>



    <div>
        <ul>
            <?php foreach($results as $res): ?>
                <li>
                    <?= Html::encode($res['fullName']) ?>
                </li>
            <?php endforeach; ?>
        </ul>

    </div>
</div>

</div>
