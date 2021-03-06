## Description

Microsservice catalog

## Run

```bash
$ docker-compose up
```

#### Access

```
http://localhost:8000
```

## Development annotations 

### Creating Categories

```shell
php artisan make:model Models/Category --all
```

### Creating a seeder

```shell
php artisan make:seeder CategoriesTableSeeder
```

### Migrate

```shell
php artisan migrate --seed
```

if an error like `SQLSTATE[42S22]: Column not found...` happen, try

```shell
php artisan migrate:fresh --seed
```
### Accessing console

```shell
php artisan tinker
```

### List all categories (inside the tinker)

```php
\App\Models\Category::all();
```

### List routes

```shell
php artisan route:list
```

### rerun seed

```shell
php artisan migrate:refresh --seed
```

### see register deleted with SoftDeletes

```shell
php artisan tinker

Category::find(1)->delete();

Category::withTrashed()->find(1);
```

### generate uuid

```shell
php artisan tinker

use Ramsey\Uuid\Uuid;
echo Uuid::uuid4();
```

## Run tests

```shell
vendor/bin/phpunit
```

## Create unitary tests to category

```shell
php artisan make:test CategoryTest --unit
```

## Create feature test to category

```shell
php artisan make:test Models/CategoryTest
```

## Test specific class

```shell
vendor/bin/phpunit --filter CategoryTest
```

## Test specific class:method

```shell
vendor/bin/phpunit --filter CategoryTest::testExample
```

## Test by relative path

```shell
vendor/bin/phpunit tests/Unit/CategoryTest.php
```
