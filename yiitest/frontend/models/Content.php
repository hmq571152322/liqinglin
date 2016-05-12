<?php

namespace frontend\models;

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
class Content extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'content';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['c_title', 'c_content', 'c_lock', 'c_photo', 'c_j'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'c_id' => 'C ID',
            'c_title' => 'C Title',
            'c_content' => 'C Content',
            'c_lock' => 'C Lock',
            'c_photo' => 'C Photo',
            'c_j' => 'C J',
        ];
    }
}
