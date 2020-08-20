<?php

namespace ksmz\Json;

use ksmz\json\Exceptions\ControlCharacterException;
use ksmz\json\Exceptions\DepthException;
use ksmz\json\Exceptions\InfOrNanException;
use ksmz\json\Exceptions\InvalidJsonException;
use ksmz\json\Exceptions\InvalidPropertyNameException;
use ksmz\json\Exceptions\JsonException;
use ksmz\json\Exceptions\RecursionException;
use ksmz\json\Exceptions\SyntaxException;
use ksmz\json\Exceptions\UnsupportedTypeException;
use ksmz\json\Exceptions\Utf16Exception;
use ksmz\json\Exceptions\Utf8Exception;

class Thrower
{
    /**
     * @var array
     */
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

    /**
     * @param int $code
     * @return \ksmz\json\Exceptions\JsonException
     */
    public static function whileEncoding(int $code)
    {
        $exception = self::$errors[$code] ?? JsonException::class;

        return new $exception;
    }

    /**
     * @param int $code
     * @return \ksmz\json\Exceptions\JsonException
     */
    public static function whileDecoding(int $code)
    {
        $exception = self::$errors[$code] ?? JsonException::class;

        return new $exception;
    }
}
