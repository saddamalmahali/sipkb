<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

class Model extends \yii\base\Model
{

	public static function createMultiple($modelClass, $multipleModels = [])
	{
		$model = new $modelClass;
		$forName = $model->forName();
		$post = Yii::$app->request->post($forName);
		$models = [];

		if(!empty($multipleModels)){
			$keys = array_keys(ArrayHelper::map($multipleModels, 'id', 'id'));
			$multipleModels = array_combine($keys, $multipleModels);
		}

		if($post && is_array($post)){
			foreach ($post as $i => $item) {
				if(isset($item['id']) && !empty($item['id']) && isset($multipleModels[$item['id']])){
					$models[] = $multipleModels[$item['id']];
				}else{
					$models[] = new $modelClass;
				}
			}
		}

		unset($model, $forName, $post);

		return $models;
	}
}