<?php
declare(strict_types=1);
namespace MLCore\v1\Module;
use Error;
use MLCore\v1\Plugin\MLPError;
class MLMRoute{
    protected array $_Path = array();
    public function __construct() { $this->_Path = explode("/",$_SERVER['REDIRECT_URL'] ?? array("/")); return $this; }
    public function getArray() : array { return $this->_Path ?? array(); }
    public function getJSON() : string { return json_encode($this->getArray(),JSON_UNESCAPED_UNICODE) ?? "{}"; }
    public function getCount() : int { return sizeof($this->_Path) ?? 0; }
    public function getName(int $no) : ?string { return $this->_Path[$no] ?? null; }
    public function getURL() : string { return implode("/",$this->_Path) ?? ""; }
    public function getPHP(string $path) : void { try { @include_once $path; }catch (Error $e){ MLPError::ErrorStop(931 ?? 0,"[Error] Action File : ".$path,(array)$e); } }
}