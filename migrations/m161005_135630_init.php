<?php

use yii\db\Migration;

class m161005_135630_init extends Migration
{
    public function up()
    {
        $sql = <<< EOD
CREATE TABLE requests(
  id    INTEGER PRIMARY KEY,
  name  TEXT,
  score   INTEGER
);

EOD;
        $this->execute($sql);

    }

    public function down()
    {
        echo "m161005_135630_init cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
