<?php

namespace ksmz\json\Exceptions;

class InvalidJsonException extends JsonException
{
    public function __construct(\Throwable $previous = null)
    {
        parent::__construct('State mismatch (invalid or malformed JSON)', JSON_ERROR_STATE_MISMATCH, $previous);
    }
}
