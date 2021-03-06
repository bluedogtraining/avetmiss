# CHANGELOG

## 4.5.0 - 2019-11-29

* Add support for middle name to nameForEncryption utility
* Update PHP version to 5.4 (package already contained 5.3 breaking short array syntax '[ ]' )

## 4.4.0 - 2019-10-24

* Support Laravel versions 6 and 7

## 3.0.2 - 2015-07-09

* Add NAT file descriptions
* Add CC attribution

## 3.0.1 - 2015-07-01

* Fix `File::writeRow` not appending to data.

## 3.0.0 - 2015-07-01

### Changed

* Namespace has been changed from `Avetmiss` to `Bdt\Avetmiss`
* `Row` is no longer an abstract class, and accepts a Fieldset on initialisation.
* `Field::isValid()` is now `Field::validate($value)`
* `Field::render()` is now `Field::render($value)`
* `Nat\V7\*` classes are now instances of `Fieldset`, to create a new Row, call
  `new Row(new Nat\V7\Nat120)` for example.
* `FormatInterface::isFormatValid()` (and implementing classes) now expect a `$value` argument.
* `Row::getField` now throws `Bdt\Avetmiss\Exceptions\FieldNotFoundException` instead of `UnexistingFieldException`
* `Row::populateFields` now throws `Bdt\Avetmiss\Exceptions\EmptyRowException` instead of `UnexistingFieldException`
* `Field::` methods `name`, `length`, `in`, and `pad` now return a new instance of Field instead of modifying the existing instance.
* `Config` is now an abstract class.
* `Field` protected values `name`, `length`, `in` and `pad` now have implicit `null` values, instead of defined.
* `FormatInterface` has been removed, its `isFormatValue` is now an abstract method on the abstract `Field` class.
* Fix typos in:
  * Nat010: `email_adress`
  * Nat080: `adress_location_suburb_locality_or_town`
  * Nat080: `adress_street_number`
  * Nat080: `adress_street_name`
* `File::addRow` is now `File::writeRow` and stores the rendered row string in memory, so that the row can be discarded.

### Added

* Added `Fieldset` class.
* Added `File::createRow` method.
* Added `Row::set` and `Row::get` methods. For performance, these should be favoured over the magic `__get` and `__set` methods.
* Added `Frameworks` directory with framework-specific utilities.
* Added `Row::render` method

### Removed

* Removed `Field::getValue()`, instead call `Row::__get($fieldName)`
* Removed `Field::setValue($value)`, instead call `Row::__set($fieldName, $value)`
* Removed `Row::getField()`, instead use `Row::getFieldset()->getFieldByName()`
* Removed `Row::addField()`, fields should now be added directly to the fieldset.
* Removed `Row::addFields()`, fields should now be added directly to the fieldset.

## 2.0.0 - 2014-03-24

* Support for PHP 5.3 removed.

## 1.0.0 - 2014-03-24

* Initial release.