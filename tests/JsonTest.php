<?php

namespace ksmz\json\Tests;

use ksmz\json\Json;
use PHPUnit\Framework\TestCase;

class JsonTest extends TestCase
{
    /** @test */
    public function it_decodes_valid_json()
    {
        $validJson = '{"valid": "json", "numbers": [1, 2, 3]}';
        $validArray = ['valid' => 'json', 'numbers' => [1, 2, 3]];

        $this->assertEquals((object) $validArray, Json::decode($validJson));
        $this->assertEquals($validArray, Json::decode($validJson, true));
    }

    /** @test */
    public function it_encodes_to_valid_json()
    {
        $validArray = ['valid' => 'json', 'numbers' => [1, 2, 3]];
        $this->assertEquals('{"valid":"json","numbers":[1,2,3]}', Json::encode($validArray));
    }

    /**
     * @test
     * @expectedException \ksmz\json\Exceptions\DepthException
     * @expectedExceptionCode JSON_ERROR_DEPTH
     */
    public function it_throws_depth_exceptions()
    {
        $deepJson = '{"x": [{"x": "x"}]}';
        Json::decode($deepJson, false, 3);
    }

    /**
     * @test
     * @expectedException \ksmz\json\Exceptions\InvalidJsonException
     * @expectedExceptionCode JSON_ERROR_STATE_MISMATCH
     */
    public function it_throws_invalid_json_exceptions()
    {
        Json::decode('[1}');
    }

    /**
     * @test
     * @expectedException \ksmz\json\Exceptions\ControlCharacterException
     * @expectedExceptionCode JSON_ERROR_CTRL_CHAR
     */
    public function it_throws_ctrl_char_exceptions()
    {
        Json::decode('["' . chr(0) . 'abcd"]');
    }

    /**
     * @test
     * @expectedException \ksmz\json\Exceptions\SyntaxException
     * @expectedExceptionCode JSON_ERROR_SYNTAX
     */
    public function it_throws_syntax_error_exceptions()
    {
        Json::decode('[1');
    }

    /**
     * @test
     * @expectedException \ksmz\json\Exceptions\Utf8Exception
     * @expectedExceptionCode JSON_ERROR_UTF8
     */
    public function it_throws_on_invalid_utf8()
    {
        $utf8 = "{\"\x61\xb0\x62\"}";

        Json::decode($utf8);
    }

    /**
     * @test
     * @expectedException \ksmz\json\Exceptions\Utf16Exception
     * @expectedExceptionCode JSON_ERROR_UTF16
     */
    public function it_throws_utf16_exceptions()
    {
        $utf16 = '{"\ud834"}';

        Json::decode($utf16);
    }

    /**
     * @test
     * @expectedException \ksmz\json\Exceptions\RecursionException
     * @expectedExceptionCode JSON_ERROR_RECURSION
     */
    public function it_throws_on_recursion()
    {
        $a = [];
        $a[] = &$a;

        Json::encode($a);
    }

    /**
     * @test
     * @expectedException \ksmz\json\Exceptions\InfOrNanException
     * @expectedExceptionCode JSON_ERROR_INF_OR_NAN
     */
    public function it_throws_on_inf()
    {
        Json::encode(INF);
    }

    /**
     * @test
     * @expectedException \ksmz\json\Exceptions\InfOrNanException
     * @expectedExceptionCode JSON_ERROR_INF_OR_NAN
     */
    public function it_throws_on_nan()
    {
        Json::encode(NAN);
    }

    /**
     * @test
     * @expectedException \ksmz\json\Exceptions\UnsupportedTypeException
     * @expectedExceptionCode JSON_ERROR_UNSUPPORTED_TYPE
     */
    public function it_throws_on_unsupported_types()
    {
        $resource = fopen(__FILE__, 'r');
        Json::encode($resource);

        fclose($resource);
    }

    /**
     * @test
     * @expectedException \ksmz\json\Exceptions\InvalidPropertyNameException
     * @expectedExceptionCode JSON_ERROR_INVALID_PROPERTY_NAME
     */
    public function it_throws_on_invalid_properties()
    {
        Json::decode('{"key": {"\u0000": "aa"}}');
        Json::decode('[{"key1": 0, "\u0000": 1}]');
    }
}
