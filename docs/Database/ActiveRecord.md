## 📝 Usage

### `App\DB\Migration`

#### Migration@fillColumn(string $table, string $column, $value)

Set the default value of an existing column.

```php
<?php

class m180524_091606_run_migration extends App\DB\Migration\Migration
{
    public function safeUp()
        $this->addColumn('users', 'country', 'string');
        $this->fillColumn('users', 'country', 'GB');
    }
}
```

### `App\DB\ActiveRecord`

Returns a single of the ActiveRecord model instance that matches the values of the $attribute array values or returns a new instance of the ActiveRecord model with properties corresponding to the values of the $attributes array + values of the $values array

```php
<?php

class User extends App\DB\ActiveRecord
{}

$user = User::firstOrNew(['id' => 50]);
$user = User::firstOrNew(['id' => 50], ['sort' => 10]);
```

Returns a single of the ActiveRecord model instance that matches the values of the $attribute array values or returns a new instance of the ActiveRecord model with properties corresponding to the values of the $attributes array + values of the $values array and save it

```php
<?php

class User extends App\DB\ActiveRecord
{}

$user = User::firstOrCreate(['id' => 1]);
$user = User::firstOrCreate(['id' => 1], ['username' => 'Admin']);
```

Finds the model from the passed attributes, if the model is found, then assign the values of the $values and save it if the model is not found, then create it with the values $attributes + $value and save it

```php
<?php

class User extends App\DB\ActiveRecord
{}

$user = User::updateOrCreate(['id' => 1]);
$user = User::updateOrCreate(['id' => 1], ['username' => 'Admin']);
```

Return the model with the passed attributes, if the model is not found, then the HTTP 404 exception will be thrown

```php
<?php

class User extends App\DB\ActiveRecord
{}

$user = User::firstOrFail(['id' => 1]);
```

Returns array of models by the passed attributes, if no model is found, then the HTTP 404 exception will be thrown

```php
<?php

class User extends App\DB\ActiveRecord
{}

$user = User::findOrFail(['id' => 1]);
```

Create a new instance of the model and persist it.

```php
<?php

class User extends App\DB\ActiveRecord
{}

$user = User::create(['username' => 'Admin']);
// Creates and returns a new user with the username of 'Admin'
```

Create a new instance of the model without persisting it.

```php
<?php

class User extends App\DB\ActiveRecord
{}

$user = User::make(['username' => 'Admin']);
// Makes a new user with the username of 'Admin' but does NOT save it to the database
```

Delete a model matching the given attributes.

```php
<?php

class User extends App\DB\ActiveRecord
{}

User::deleteIfExists(['username' => 'Admin']);
// Deletes all users with the username of 'Admin'
```

Get the first instance of a model.

```php
<?php

class User extends App\DB\ActiveRecord
{}

$user = User::first();
// Returns the first user in the database
```

Get the next row.

```php
<?php

class User extends App\DB\ActiveRecord
{}

$user = User::getNext($id);
// Returns the next user in the database
```

Get the previous row.

```php
<?php

class User extends App\DB\ActiveRecord
{}

$user = User::getPrev($id);
// Returns the previous user in the database
```
