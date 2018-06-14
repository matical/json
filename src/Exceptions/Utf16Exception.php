<?php

namespace ksmz\json\Exceptions;

class Utf16Exception extends JsonException
{
    public function __construct(\Throwable $previous = null)
    {
        parent::__construct('Single unpaired UTF-16 surrogate in unicode escape', JSON_ERROR_UTF16, $previous);
    }
}
