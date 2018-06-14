<?php

namespace ksmz\json\Exceptions;

class RecursionException extends JsonException
{
    public function __construct(\Throwable $previous = null)
    {
        parent::__construct('Recursion detected', JSON_ERROR_RECURSION, $previous);
    }
}
