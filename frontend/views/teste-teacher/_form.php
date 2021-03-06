<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TesteTeacher */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="teste-teacher-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'descricao')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'data_hora')->widget(alexantr\datetimepicker\DateTimePicker::class) ?>

    <?= $form->field($model, 'id_disciplina_turma')->dropDownList(
        ArrayHelper::map(\app\models\Disciplinaturma::getCurrentProfessorClassesIDS(Yii::$app->user->id),'id', 'anoLetraDisciplina'),
        ['prompt' => ' -- Select the Class --', 'id' => 'id_disciplina_turma']
    )   ->label('Class') ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
