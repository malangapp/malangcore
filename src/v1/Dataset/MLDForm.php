<?php
declare(strict_types=1);
namespace MLCore\v1\Dataset;
class MLDForm{
    protected array $_array = array();
    protected array $_def = array("code"=>0);
    public function __construct() { $this->_array = $this->_def; $this->_array['time'] = time(); return $this; }
    public function setData(string $name, $value) : self { $this->_array["data"][$name] = $value; return $this; }
    public function getData(string $name) { return $this->_array["data"][$name] ?? null; }
    public function setCode(int $code) : self { $this->_array["code"] = $code ?? 0; return $this; }
    public function getCode() : int { return $this->_array["code"] ?? 0; }
    public function getArray() : array { $this->_array['time_end'] = time(); return $this->_array ?? array(); }
    public function getJSON() : string { return json_encode($this->getArray(),JSON_UNESCAPED_UNICODE) ?? ""; }
}