<?php

namespace ksmz\json\Exceptions;

class ControlCharacterException extends JsonException
{
    public function __construct(\Throwable $previous = null)
    {
        parent::__construct('Control character error, possibly incorrectly encoded', JSON_ERROR_CTRL_CHAR, $previous);
    }
}
