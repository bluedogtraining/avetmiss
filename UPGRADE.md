2.0.0
=====

## Changed

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

## Added

* Added `Fieldset` class.
* Added `File::createRow` method.
* Added `Row::set` and `Row::get` methods.

## Removed

* Removed `Field::getValue()`, instead call `Row::__get($fieldName)`
* Removed `Field::setValue($value)`, instead call `Row::__set($fieldName, $value)`