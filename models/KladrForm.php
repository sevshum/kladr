<?php

namespace app\models;

use Yii;
use yii\base\Model;
use Kladr;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class KladrForm extends Model
{
    public $address;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['address'], 'required'],
        ];
    }

    /**
     * Find address in KLADR
     * @return array
     */
    public function find()
    {
        if ($this->validate()) {
            $api = new Kladr\Api(Yii::$app->params['kladrToken'], Yii::$app->params['kladrKey']);
            $query = new Kladr\Query();
            $query->ContentName = $this->address;
            $query->OneString = TRUE;
            $query->Limit     = 1;
            $arResult = $api->QueryToArray($query);
            return is_array($arResult) && isset($arResult[0]['fullName']) ? $arResult[0]['fullName'] : 'Совпадений не найдено';
        }
        return false;
    }

}
