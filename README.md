## json 
[![Build Status](https://img.shields.io/travis/matical/json.svg?style=flat-square)](https://travis-ci.org/matical/json)
[![Coveralls](https://img.shields.io/coveralls/matical/json.svg?style=flat-square)](https://coveralls.io/github/matical/json)
[![StyleCI](https://github.styleci.io/repos/137324015/shield?branch=master)](https://github.styleci.io/repos/137324015)

A json_encode/decode wrapper with specific, catchable exceptions.

### Basic Usage
```php
use ksmz\json\Json;

Json::encode(['foo' => 'bar']);
```

### Exceptions
All exceptions extend from `ksmz\json\Exceptions\JsonException`.

```php
try {
    Json::encode(...);
} catch (RecursionException $exception) {
    // Specific exception
} catch (JsonException $exception) {
    // All possible exceptions
}
```

Error codes and messages can be retrieved from the corresponding exception (`$e->getMessage()`/`$e->getCode()`). 
Codes correspond to their respective error [constants](https://secure.php.net/manual/en/function.json-last-error.php).
For messages, exceptions with use messages identical to what `json_last_error_msg()` might return. Check out the [php-src](https://github.com/php/php-src/blob/master/ext/json/json.c#L215) for examples.

### Available Exceptions
```php
public static $errors = [
    JSON_ERROR_DEPTH                 => DepthException::class,
    JSON_ERROR_STATE_MISMATCH        => InvalidJsonException::class,
    JSON_ERROR_CTRL_CHAR             => ControlCharacterException::class,
    JSON_ERROR_SYNTAX                => SyntaxException::class,
    JSON_ERROR_UTF8                  => Utf8Exception::class,
    JSON_ERROR_UTF16                 => Utf16Exception::class,
    JSON_ERROR_RECURSION             => RecursionException::class,
    JSON_ERROR_INF_OR_NAN            => InfOrNanException::class,
    JSON_ERROR_UNSUPPORTED_TYPE      => UnsupportedTypeException::class,
    JSON_ERROR_INVALID_PROPERTY_NAME => InvalidPropertyNameException::class,
];
```

Some exceptions are self explantory, and some are a little vague. Check out the [tests](https://github.com/matical/json/tree/master/tests) for some examples. All exception tests use the same "inputs" as what PHP internally uses to test ext-json.
