<?php

namespace ksmz\json\Exceptions;

class InvalidPropertyNameException extends JsonException
{
    public function __construct(\Throwable $previous = null)
    {
        parent::__construct('The decoded property name is invalid', JSON_ERROR_INVALID_PROPERTY_NAME, $previous);
    }
}
