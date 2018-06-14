<?php

namespace ksmz\json;

class Json
{
    /**
     * @param mixed $value
     * @param int   $options
     * @param int   $depth
     * @return string
     *
     * @throws \ksmz\json\Exceptions\JsonException
     */
    public static function encode($value, int $options = 0, int $depth = 512): string
    {
        $json = json_encode($value, $options, $depth);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw Thrower::whileEncoding(json_last_error());
        }

        return $json;
    }

    /**
     * @param string $json
     * @param bool   $asArray
     * @param int    $depth
     * @param int    $options
     * @return mixed
     *
     * @throws \ksmz\json\Exceptions\JsonException
     */
    public static function decode(string $json, bool $asArray = false, int $depth = 512, int $options = 0)
    {
        $decoded = json_decode($json, $asArray, $depth, $options);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw Thrower::whileDecoding(json_last_error());
        }

        return $decoded;
    }
}
