Yii2 SoftDelete
===============

Soft delete extension for Yii2 framework.

This extension ensures that soft-deleted has delete native consistent behavior and is IDE-friendly.


Usage
-----

Once the extension is installed, simply use it in your code by  :

Edit model class:
```php
use App\DB\Migration\Behaviors\SoftDeleteBehavior;
use App\DB\Migration\SoftDelete;

class Model extends App\DB\ActiveRecord
{
    use SoftDelete;

    public function behaviors()
    {
        return [
            'class' => SoftDeleteBehavior::className(),
        ];
    }
}
```

Change database table structures, add `deleted_at (int 11)` field and attached to UNIQUE index.

API
---

### ActiveRecord class (SoftDelete Trait):

find The series method will return `App\DB\ActiveQuery` Object

+ softDelete() Use soft delete mode to delete data
+ forceDelete() Use physical delete mode to force deletion of data
+ restore() Recover soft deleted model data
+ isTrashed() Whether to be soft deleted

The following commands are `find()` / `findOne()` / `findAll()` Corresponding versions in different modes：

All models (including those soft deleted) ：

+ findWithTrashed()
+ findOneWithTrashed($condition)
+ findAllWithTrashed($condition)

Only find models that have been soft deleted：

+ findOnlyTrashed()
+ findOneOnlyTrashed($condition)
+ findAllOnlyTrashed($condition)

The following commands have been rewritten into a soft deleted version：

+ find()
+ findOne()
+ findAll()
+ delete()

### App\DB\ActiveQuery

Added the three methods `withTrashed()`, `withoutTrashed()` and `onlyTrashed()`,
Set the corresponding search mode.

### Credits
-   [yiithings](https://github.com/yiithings)
