<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "requests".
 *
 * @property integer $id
 * @property string $name
 * @property integer $score
 */
class Request extends \yii\db\ActiveRecord
{
    const LAST_REQ_LIMIT = 5;
    const LAST_REQUESTS = 'last';
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'requests';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string'],
            [['score'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'score' => 'Score',
        ];
    }

    public static function handleNew($address)
    {
        if (!$request = self::findOne(['name' => $address])) {
            $request = new self(['name' => $address]);
        }
        $request->score++;
        $request->save();
        $lastRequests = Yii::$app->cache->get(self::LAST_REQUESTS);
        if (!is_array($lastRequests)) {
            $lastRequests = [];
        }
        array_unshift($lastRequests, $address); //add new element to the beginning
        $lastRequests = array_unique($lastRequests);
        if (count($lastRequests) > self::LAST_REQ_LIMIT) {
            array_pop($lastRequests);
        }
        Yii::$app->cache->set(
            self::LAST_REQUESTS,
            $lastRequests,
            0);
    }

    public static function getLastRequestsWithScores()
    {
        $res = [];
        $lastRequests = Yii::$app->cache->get(self::LAST_REQUESTS);
        if (is_array($lastRequests)) {
            foreach ($lastRequests as $req) {
                $request = self::findOne(['name' => $req]);
                $res[$req] = $request ? $request->score : 0;
            }
        }
        return $res;
    }
}