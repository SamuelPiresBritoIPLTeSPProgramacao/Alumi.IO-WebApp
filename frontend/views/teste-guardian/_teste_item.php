<?php

use app\models\TesteGuardian;
use yii\helpers\Html;
use yii\helpers\StringHelper;
use yii\helpers\Url;

/**
 * @var $model TesteGuardian
 */
?>

<div>
    <a href="<?php echo Url::to(['teste-guardian/view','id' => $model->id]) ?> ">
        <h3><?php echo $model->disciplinaTurma->getAnoLetraDisciplina() ?></h3>
    </a>
    <div>
        <?php echo StringHelper::truncateWords($model->getEncondedDescricao(),'20')  ?>
    </div>
    <br>
    <p class="text-muted text-right">
        <small>
            At: <b> <?php echo Yii::$app->formatter->asDatetime($model->data_hora) ?></b>
        </small>
        <br>
    </p>
    <hr>
</div>
