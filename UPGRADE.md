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

## Added

* Added `Fieldset` class.
* Added `File::createRow` method.

## Removed

* Removed `Field::getValue()`, instead call `Row::__get($fieldName)`
* Removed `Field::setValue($value)`, instead call `Row::__set($fieldName, $value)`