<?php

namespace app\controllers\api\v1;

use app\models\Country;
use yii\rest\ActiveController;

/**
 * Country Controller API
 *
 * @author Budi Irawan <deerawan@gmail.com>
 */
class CountryController extends ActiveController
{
    public $modelClass = Country::class;


}


