<?php

use yii\db\Migration;

/**
 * Handles the creation of table `otp_log`.
 */
class m170408_093843_create_otp_log_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('otp_log', [
            'id' => $this->primaryKey(),
            'telno' => $this->string(20)->notNull(),
            'refcode' => $this->string(3)->notNull(),
            'passcode' => $this->smallInteger(4)->notNull(),
            'expire_time' => $this->integer()->notNull(),
            'verified' => $this->boolean()->notNull()->defaultValue(false),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('otp_log');
    }
}
