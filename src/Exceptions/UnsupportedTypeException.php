<?php

namespace ksmz\json\Exceptions;

class UnsupportedTypeException extends JsonException
{
    public function __construct(\Throwable $previous = null)
    {
        parent::__construct('Type is not supported', JSON_ERROR_UNSUPPORTED_TYPE, $previous);
    }
}
