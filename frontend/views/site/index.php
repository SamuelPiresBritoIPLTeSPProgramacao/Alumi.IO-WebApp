<?php

/* @var $this yii\web\View */

use yii\helpers\Url;

$this->title = 'Alumio';

?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Alumio!</h1>

        <p class="lead">A tua nova caderneta escolar!</p>

        <p><a class="btn btn-lg btn-success" href="<?=Url::toRoute('site/login')?>">Login</a></p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Alunos</h2>

                <p>Bem vindo! Se fores aluno clica no link em baixo</p>
                <p><a class="btn btn-default" href="<?= Url::toRoute('site/aluno-operations') ?>">Aluno Login</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Professores</h2>

                <p>Bem vindo professor! Clica no link em baixo para entar como professor</p>

                <p><a class="btn btn-default" href="<?= Url::toRoute('site/professor-operations') ?>">Professor
                        Login</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Encarregados de Educaçao</h2>

                <p>Bem Vindo Encarregados de Educação! Clica no link em baixo para saber as informaçoes do seu
                    educando!</p>

                <p><a class="btn btn-default" href="<?= Url::toRoute('site/encarregados-educacao-operations') ?>">Encarregados
                        de Educacao Login</a></p>
            </div>
        </div>

    </div>
</div>
