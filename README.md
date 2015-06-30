# Avetmiss

This library is designed to help with the generation of AVETMISS NAT files.

[![Build Status](https://travis-ci.org/bluedogtraining/avetmiss.png?branch=master)](https://travis-ci.org/bluedogtraining/avetmiss)

## Install

Via Composer

``` bash
$ composer require bluedogtraining/avetmiss
```

## Usage

The idea behind the library is very simple.

1. Create fieldset with field definitions (or use a bundled fieldset)
2. Initiate a file with the fieldset.
3. Create a row from the file.
4. Populate the row.
5. Add the populated row back to the file.
6. Export the file.


```php
use Bdt\Avetmiss\File;
use Bdt\Avetmiss\Nat\V7\Nat120;

// array of student courses, pulled from the database
$studentcourses = DB::getStudentCourses();

// initiate a new nat file
$file = new File(new Nat120);

// loop through the studentcourses and add them to the file
foreach($this->studentcourses as $studentcourse) {

    try {
        $row = $file->createRow();
        
        $row->set('client_id', $studentcourse->Student->id);
        $row->set('subject_id', $studentcourse->Course->id);
        //...
        
        $file->writeRow($row);
    } catch(Exception $e) {
        // Display or log any errors.
    }
}

$file->export('nat120.txt');
```

### Extending

The library comes with preliminary Fieldset definitions for AVETMISS Version 7 NAT files.

You can very easily add your own NAT files if required.

```php
$myFieldset = new Fieldset([
    Field::make('date')->name('enrolment_date')->length(8),
    Field::make('numeric')->name('state_id')->length(2)->pad('0')->in(Config::keys('states')),
]);
```

Or own rules.

```php
class MyOwnConfig extends Config
{
    protected static $deliveryTypes = [
        10 => 'Classroom-based',
        20 => 'Electronic based',
        30 => 'Employment based',
        40 => 'Other delivery (eg correspondence)',
        90 => 'Not applicable - recognition of prior learning/ recognition of current competency/ credit transfer'
    ];
}
```

### Framework Integration

#### Laravel 5

This library comes with a service provider to add rules for validating against
AVETMISS NAT fields.

To use this, first add the `Bdt\Avetmiss\Frameworks\Laravel\ValidationServiceProvider` to the `providers` array in `config/app.php`.

```php
$validator = Validator::make([
    'my_start_date' => '01022000'
], [
    'my_start_date' => 'avetmiss:nat120,activity_start_date'
]);

$isValid = $validator->passes();
```

You can optionally pass a third boolean parameter to the `avetmiss` rule to enforce a maximum string length.

#### Zend Framework 1

This library comes with a utility for creating Zend Framework 1 validators based
on AVETMISS NAT fields.

```php
$factory = new Bdt\Avetmiss\Frameworks\Zf1\ValidatorFactory;
$validator = $factory->create('nat120', 'activity_start_date');
$validator->isValid('my_start_date');
```

You can optionally pass a third boolean parameter to the `ValidatorFactory::create` method to enforce a maximum string length.

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ composer test
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
