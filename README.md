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
        
        $row->client_id = $studentcourse->Student->id;
        $row->subject_id = $studentcourse->Course->id;
        //...
        
        $file->addRow($row);
    } catch(Exception $e) {
        // Display or log any errors.
    }
}

$file->export('nat120.txt');
```

### Extending

The library comes with Fieldset definitions for AVETMISS Version 7 NAT files.

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

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ composer test
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
