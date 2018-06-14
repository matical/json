<?php

namespace ksmz\json\Exceptions;

class SyntaxException extends JsonException
{
    public function __construct(\Throwable $previous = null)
    {
        parent::__construct('Syntax error', JSON_ERROR_SYNTAX, $previous);
    }
}
