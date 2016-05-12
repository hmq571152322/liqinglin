<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "content".
 *
 * @property integer $c_id
 * @property string $c_title
 * @property string $c_content
 * @property string $c_lock
 * @property string $c_photo
 * @property string $c_j
 */
class Login extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'login';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['l_name'], 'string', 'max' => 255],
            [['l_pwd'], 'string', 'max' => 32]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'l_id' => 'L ID',
            'l_name' => 'L Name',
            'l_pwd' => 'L Pwd',
        ];
    }
    /*ͼƬ�ϴ�*/

}
