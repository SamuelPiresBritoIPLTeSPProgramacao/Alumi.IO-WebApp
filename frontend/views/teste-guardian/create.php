<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TesteGuardian */

$this->title = 'Create Teste Guardian';
$this->params['breadcrumbs'][] = ['label' => 'Teste Guardians', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="teste-guardian-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
