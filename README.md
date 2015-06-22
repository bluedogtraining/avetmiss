# Avetmiss

This library is designed to help with the generation of avetmiss nat-files.

[![Build Status](https://travis-ci.org/bluedogtraining/avetmiss.png?branch=master)](https://travis-ci.org/bluedogtraining/avetmiss)

## How to use

The idea behind the library is very simple.

1. you initiate a file
2. you initiate a row
3. you add your fields to the row
4. you add the row to the file
5. you export the file

### Code example

```php
// array of student courses, pulled from the database
protected $studentcourses;

// initiate a new nat file
$file = new File(new Nat120);

// loop through the studentcourses and add them to the file
foreach($this->studentcourses as $studentcourse) {

    try {
        $row = $file->createRow();
        
        $row->client_id = $studentcourse->Student->id;
        $row->subject_id = $studentcourse->Course->id;
        ...
        
        $file->addRow($row);
    }
    catch(Exception $e) {
        // display - log the error
    }
}

$file->export('nat120.txt');
```

### Behind the scene

The library comes with existing nat files and rules matching avetmiss version 7.

You can very easily add your own nat files if required.

```php
class MyOwnNat extends Row
{
    public function __construct()
    {
        $this->addFields([
            Field::make('date')->name('enrolment_date')->length(8),
            Field::make('numeric')->name('state_id')->length(2)->pad('0')->in(Config::keys('states')),
        ]);
    }
}
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

### How to install

Simply add `"bluedogtraining/avetmiss" : "dev-master"` to your composer.json and run a `composer update`.

### Running the tests

The library comes with a phpUnit testing suite that you can run with `phpunit` from the root folder.
