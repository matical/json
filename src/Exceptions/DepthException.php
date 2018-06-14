<?php

namespace ksmz\json\Exceptions;

class DepthException extends JsonException
{
    public function __construct(\Throwable $previous = null)
    {
        parent::__construct('Maximum stack depth exceeded', JSON_ERROR_DEPTH, $previous);
    }
}
