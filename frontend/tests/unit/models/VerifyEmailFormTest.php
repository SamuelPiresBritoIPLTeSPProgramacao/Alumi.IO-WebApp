<?php

namespace frontend\tests\unit\models;

use app\models\Professor;
use common\fixtures\ProfessorFixture;
use common\fixtures\UserFixture;
use frontend\models\VerifyEmailForm;
use Yii;

class VerifyEmailFormTest extends \Codeception\Test\Unit
{
    /**
     * @var \frontend\tests\UnitTester
     */
    protected $tester;


    public function _before()
    {
        $this->tester->haveFixtures([
            'user' => [
                'class' => UserFixture::className(),
                'dataFile' => codecept_data_dir() . 'user.php'
            ],
            'professor' => [
                'class' => ProfessorFixture::className(),
                'dataFile' => codecept_data_dir() . 'professor.php'
            ]
        ]);
    }

    public function testVerifyWrongToken()
    {
        $this->tester->expectException('\yii\base\InvalidArgumentException', function() {
            new VerifyEmailForm('');
        });

        $this->tester->expectException('\yii\base\InvalidArgumentException', function() {
            new VerifyEmailForm('notexistingtoken_1391882543');
        });
    }

    public function testAlreadyActivatedToken()
    {
        $this->tester->expectException('\yii\base\InvalidArgumentException', function() {
            new VerifyEmailForm('already_used_token_1548675330');
        });
    }

    public function testVerifyCorrectToken()
    {
        $auth = Yii::$app->authManager;
        $UserNewRole = $auth->getRole('teacher');
        $auth->assign($UserNewRole, 4000);

        $model = new VerifyEmailForm('4ch0qbfhvWwkcuWqjN8SWRq72SOw1KYT_1548675330');
        $user = $model->verifyEmail();
        expect($user)->isInstanceOf('common\models\User');

        expect($user->username)->equals('test.test');
        expect($user->email)->equals('test@mail.com');
        expect($user->status)->equals(\common\models\User::STATUS_ACTIVE);
        expect($user->validatePassword('Test1234'))->true();
        $auth->revokeAll(4000);
    }
}
