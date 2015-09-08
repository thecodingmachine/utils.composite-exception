[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/mouf/utils.composite-exception/badges/quality-score.png?b=1.0)](https://scrutinizer-ci.com/g/mouf/utils.composite-exception/?branch=1.0)
[![Build Status](https://travis-ci.org/mouf/utils.composite-exception.svg?branch=1.0)](https://travis-ci.org/mouf/utils.composite-exception)
[![Coverage Status](https://coveralls.io/repos/mouf/utils.composite-exception/badge.svg?branch=1.0&service=github)](https://coveralls.io/github/mouf/utils.composite-exception?branch=1.0)

# Composite exception

This project contains a simple PHP exception that can aggregate multiple exceptions in one.
The rationale behind this idea is to allow exceptions to be triggered in loops, and to throw only one at the end of your script:

## Installation

You can install this package through Composer:

```json
{
    "require": {
        "mouf/utils.composite-exception": "~1.0"
    }
}
```

The packages adheres to the [SemVer](http://semver.org/) specification, and there will be full backward compatibility
between minor versions.

## Usage

This package contains a `CompositeException` class with 2 methods: `add(\Throwable $e)` and `isEmtpy()`.
Typical usage looks like this:

```php
use Mouf\Utils\CompositeException;

$compositeException = new CompositeException();

foreach (...) {
    try {
        // Do stuff
    } catch (\Exception $e) {
        // Add exceptions to the composite exception
        $compositeException->add($e);
    }
}

if (!$compositeException->isEmpty()) {
    // If not empty, let's throw the composite exception.
    throw $compositeException;
}
```
