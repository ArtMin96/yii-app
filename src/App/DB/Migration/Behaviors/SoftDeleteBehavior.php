<?php

namespace App\DB\Migration\Behaviors;

use yii\behaviors\TimestampBehavior;

/**
 * Class SoftDeleteBehavior
 *
 * ```php
 * use App\DB\Migration\Behaviors\SoftDeleteBehavior;
 *
 * public function behaviors()
 * {
 *     return [
 *         SoftDeleteBehavior::className(),
 *     ];
 * }
 * ```
 *
 * @property $owner
 */
class SoftDeleteBehavior extends TimestampBehavior
{
    const EVENT_BEFORE_SOFT_DELETE = 'beforeSoftDelete';
    const EVENT_AFTER_SOFT_DELETE = 'afterSoftDelete';
    const EVENT_BEFORE_FORCE_DELETE = 'beforeForceDelete';
    const EVENT_AFTER_FORCE_DELETE = 'beforeForceDelete';
    const EVENT_BEFORE_RESTORE = 'beforeRestore';
    const EVENT_AFTER_RESTORE = 'afterRestore';

    public $deletedAtAttribute = 'deleted_at';

    public $withTimestamp = false;

    public function init()
    {
        if ($this->withTimestamp) {
            parent::init();
        }

        $this->attributes = array_merge($this->attributes, [
            static::EVENT_BEFORE_SOFT_DELETE => $this->deletedAtAttribute,
        ]);
    }
}
