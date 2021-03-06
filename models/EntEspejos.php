<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ent_espejos".
 *
 * @property string $id_post
 * @property string $num_subscriptores
 *
 * @property EntPosts $idPost
 * @property EntRespuestasEspejo $entRespuestasEspejo
 * @property EntUsuariosSubscripciones $entUsuariosSubscripciones
 */
class EntEspejos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ent_espejos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_post'], 'required'],
            [['id_post', 'num_subscriptores'], 'integer'],
            [['id_post'], 'exist', 'skipOnError' => true, 'targetClass' => EntPosts::className(), 'targetAttribute' => ['id_post' => 'id_post']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_post' => 'Id Post',
            'num_subscriptores' => 'Num Subscriptores',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPost()
    {
        return $this->hasOne(EntPosts::className(), ['id_post' => 'id_post']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntRespuestasEspejo()
    {
        return $this->hasOne(EntRespuestasEspejo::className(), ['id_post' => 'id_post']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntUsuariosSubscripciones()
    {
        return $this->hasOne(EntUsuariosSubscripciones::className(), ['id_post' => 'id_post']);
    }
}
