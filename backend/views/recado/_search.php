<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\RecadoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="recado-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'topico') ?>

    <?= $form->field($model, 'descricao') ?>

    <?= $form->field($model, 'assinado') ?>

    <?= $form->field($model, 'data_hora') ?>

    <?php // echo $form->field($model, 'id_disciplina_turma') ?>

    <?php // echo $form->field($model, 'id_aluno') ?>

    <?php // echo $form->field($model, 'id_professor') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
