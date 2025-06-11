# Laravel Decimal

this package uses php-decimal for handle decimal. you can see documentation with this link:

https://php-decimal.io

you can use php-decimal in your php project, but if you need to have decimal in your model you should have decimal cast in your laravel project. with this project you will have that:)  

this package helps you to have Decimal object in your models and do not loose anything in casting and saving in database.
## Installation

```php
composer require roboticsexpert/laravel-decimal
```

## Usage
first you need to change your migration like this
```php
$table->unsignedDecimal('your_field', 32, 16);

```

after installing, go to that model you need have decimal attribute and add that field in cast array like this:

```php 

use Roboticsexpert\LaravelDecimal\DecimalCast;


class YourModel extend Model {
    public $cast=[
        'your_field' => DecimalCast::class,
    ];

}
```

after adding that you can set value to your model like this:

```php 

$value = new \Decimal\Decimal('12345.131123123123123');
$model=new YourModel();
$model->your_filed=$value;
... (other stuff)
$model->save();

```

for getting value it will return Decimal object and you can do anything you want with that:

```php 


$model=YourModel::first();
$model->your_filed // \Decimal\Decimal "12345.131123123123123"

//add 123 to your field
$model->your_field=$model->your_field->add('123');

//sub 123 from your field
$model->your_field=$model->your_field->sub('123');

// check php-decimal package for other methods you can use!
```
