<?php

namespace api\models;

use Yii;

/**
 * This is the model class for table "{{%disciplinaturma}}".
 *
 * @property int $id
 * @property int $id_disciplina
 * @property int $id_turma
 * @property int $id_professor
 *
 * @property Disciplina $disciplina
 * @property Professor $professor
 * @property Turma $turma
 * @property Recado[] $recados
 * @property Teste[] $testes
 * @property Tpc[] $tpcs
 */
class Disciplinaturma extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%disciplinaturma}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_disciplina', 'id_turma', 'id_professor'], 'required'],
            [['id_disciplina', 'id_turma', 'id_professor'], 'integer'],
            [['id_disciplina'], 'exist', 'skipOnError' => true, 'targetClass' => Disciplina::className(), 'targetAttribute' => ['id_disciplina' => 'id']],
            [['id_professor'], 'exist', 'skipOnError' => true, 'targetClass' => Professor::className(), 'targetAttribute' => ['id_professor' => 'id']],
            [['id_turma'], 'exist', 'skipOnError' => true, 'targetClass' => Turma::className(), 'targetAttribute' => ['id_turma' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_disciplina' => 'Id Disciplina',
            'id_turma' => 'Id Turma',
            'id_professor' => 'Id Professor',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDisciplina()
    {
        return $this->hasOne(Disciplina::className(), ['id' => 'id_disciplina']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfessor()
    {
        return $this->hasOne(Professor::className(), ['id' => 'id_professor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTurma()
    {
        return $this->hasOne(Turma::className(), ['id' => 'id_turma']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecados()
    {
        return $this->hasMany(Recado::className(), ['id_disciplina_turma' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTestes()
    {
        return $this->hasMany(Teste::className(), ['id_disciplina_turma' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTpcs()
    {
        return $this->hasMany(Tpc::className(), ['id_disciplina_turma' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \api\models\query\DisciplinaturmaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \api\models\query\DisciplinaturmaQuery(get_called_class());
    }
}
