<?php

namespace ksmz\json\Exceptions;

class Utf8Exception extends JsonException
{
    public function __construct(\Throwable $previous = null)
    {
        parent::__construct('Malformed UTF-8 characters, possibly incorrectly encoded', JSON_ERROR_UTF8, $previous);
    }
}
