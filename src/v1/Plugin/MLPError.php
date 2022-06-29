<?php
declare(strict_types=1);
namespace MLCore\v1\Plugin;
final class MLPError{
    final static function ErrorStop(int $code, string $message,array $errorData = array()){ header("Content-type: application/json; charset=utf-8"); $data = array("code" => $code ?? 0, "message" => $message ?? "Non Message", "time" => time()); if(sizeof($errorData)!=0) $data['error'] = $errorData ?? array(); MLPHeader::httpCode(500); echo json_encode($data,JSON_UNESCAPED_UNICODE) ?? ""; exit(); }
    final static function NotPage(int $code, string $message,array $errorData = array()){ header("Content-type: application/json; charset=utf-8"); $data = array("code" => $code ?? 0, "message" => $message ?? "Non Message", "time" => time()); MLPHeader::httpCode(500); echo json_encode($data,JSON_UNESCAPED_UNICODE) ?? ""; exit(); }
}