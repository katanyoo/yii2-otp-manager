<?php

namespace katanyoo\otpmanager;

use Yii;

/**
 * This is the model class for table "otp_log".
 *
 * @property integer $id
 * @property string $telno
 * @property string $refcode
 * @property integer $passcode
 * @property integer $expire_time
 * @property integer $verified
 */
class OtpLog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'otp_log';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['telno', 'refcode', 'passcode', 'expire_time'], 'required'],
            [['passcode', 'expire_time', 'verified'], 'integer'],
            [['telno'], 'string', 'max' => 20],
            [['refcode'], 'string', 'max' => 3],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'telno' => 'Telno',
            'refcode' => 'Refcode',
            'passcode' => 'Passcode',
            'expire_time' => 'Expire Time',
            'verified' => 'Verified',
        ];
    }
}
