<?php

namespace ksmz\json\Exceptions;

class InfOrNanException extends JsonException
{
    public function __construct(\Throwable $previous = null)
    {
        parent::__construct('Inf and NaN cannot be JSON encoded', JSON_ERROR_INF_OR_NAN, $previous);
    }
}
