<?php

namespace App\DB;

use Yii;
use yii\base\InvalidParamException;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord as BaseActiveRecord;
use yii\web\NotFoundHttpException;

class ActiveRecord extends BaseActiveRecord
{

    /**
     * Возвращает модель по переданным атрибутам,
     * если модель не найдена, то создаём и возвращаем новую модель
     *
     * @param array $attributes атрибуты для поиска
     * @param array $values     значения для создания новой модели
     * @return ActiveRecord
     */
    public static function firstOrNew($attributes, $values = [])
    {
        $model = static::find()->andWhere($attributes)->limit(1)->one();

        if ($model === null) {
            $model = new static($attributes + $values);
        }

        return $model;
    }

    /**
     * Returns the model based on the passed attributes,
     * if the model is not found, then create, save and return a new model
     *
     * @param array $attributes     search attributes
     * @param array $values         values for creating a new model
     * @param bool $runValidation
     * @return ActiveRecord
     */
    public static function firstOrCreate($attributes, $values = [], $runValidation = false)
    {
        $model = static::firstOrNew($attributes, $values);

        if ($model->isNewRecord) {
            $model->save($runValidation);
        }

        return $model;
    }

    /**
     * Finds the model by the passed attributes,
     * if the model is found, then we assign $ values to the model properties and save it
     * if the model is not found, then create it with the values $ attributes + $ value and save it
     *
     * @param array $attributes     search attributes
     * @param array $values         values for creating a new model
     * @param bool $runValidation
     * @return ActiveRecord
     */
    public static function updateOrCreate($attributes, $values = [], $runValidation = false)
    {
        $model = static::firstOrNew($attributes, $values);

        if (!$model->isNewRecord) {
            $model->setAttributes($values);
        }

        $model->save($runValidation);

        return $model;
    }

    /**
     * Returns the model based on the passed attributes,
     * if no model is found, then an HTTP 404 exception will be thrown
     *
     * @param array $attributes
     * @return array|BaseActiveRecord
     * @throws NotFoundHttpException
     */
    public static function firstOrFail($attributes)
    {
        $model = static::find()->andWhere($attributes)->limit(1)->one();

        if ($model === null) {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }

        return $model;
    }

    /**
     * Returns an array of models by the passed attributes,
     * if no model is found then an HTTP 404 exception will be thrown
     *
     * @param array $attributes
     * @return ActiveRecord[]
     * @throws NotFoundHttpException
     */
    public static function findOrFail($attributes)
    {
        $models = static::find()->andWhere($attributes)->all();

        if (count($models) === 0) {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }

        return $models;
    }

    /**
     * Create a new instance of the model and persist it.
     *
     * @param array $attributes
     * @return self
     */
    public static function create(array $attributes): self
    {
        $model = new static;
        $model->attributes = $attributes;
        $model->save();

        return $model;
    }

    /**
     * Create a new instance of the model without persisting it.
     *
     * @param array $attributes
     * @return self
     */
    public static function make(array $attributes): self
    {
        $model = new static;
        $model->attributes = $attributes;

        return $model;
    }

    /**
     * @param array $attributes
     * @return false|int The number of rows deleted, or `false` if the deletion is unsuccessful for some reason.
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public static function deleteIfExists(array $attributes)
    {
        $model = static::findOne($attributes);

        if (!is_null($model)) {
            return $model->delete();
        }

        return false;
    }

    /**
     * Get the first instance of a model.
     *
     * @return array|BaseActiveRecord|null
     */
    public static function first()
    {
        return self::find()->one();
    }

    /**
     * Get the next active record of the current id.
     *
     * @param $id
     * @return array|BaseActiveRecord|null
     */
    public static function getNext($id)
    {
        return static::find()->where(['>', 'id', $id])->limit(1)->one();
    }

    /**
     * Get the previous record of a current id.
     *
     * @param $id
     * @return array|BaseActiveRecord|null
     */
    public function getPrev($id)
    {
        return static::find()->where(['<', 'id', $id])->orderBy(['id' => SORT_DESC])->limit(1)->one();
    }

    /**
     * Returns a value indicating whether the any of named attributes has been changed.
     * @param string $attributes  name of the attribute.
     * @param boolean $identical whether the comparison of new and old value is made for
     * identical values using `===`, defaults to `true`. Otherwise `==` is used for comparison.
     * @return boolean whether any of attributes has been changed
     */
    public function isAnyAttributeChanged($attributes, $identical = true)
    {
        /** @var BaseActiveRecord $this */
        if (!is_array($attributes)) {
            throw new InvalidParamException('type of `attributes` must be array.');
        }

        foreach ($attributes as $attribute) {
            if ($this->isAttributeChanged($attribute, $identical)) {
                return true;
            }
        }

        return false;
    }
}
