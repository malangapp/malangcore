<?php
declare(strict_types=1);
namespace MLCore\v1\Plugin;
final class MLPHeader{
    final static function setJSONHeader() : void { @header("Content-type: application/json; charset=utf-8"); }
    final static function httpCode(int $code) : void { http_response_code($code); }
}