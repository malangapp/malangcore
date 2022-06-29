<?php
declare(strict_types=1);
namespace MLCore\v1\Dataset;
class MLDError{
    protected array $_data = array();
    public function __construct(array $errorConfig = array()) { $this->_data = $errorConfig ?? array(); return $this; }
    public function code() : int { return $this->_data['code'] ?? 0; }
    public function en() : string { return $this->_data['en'] ?? ""; }
    public function ko() : string { return $this->_data['ko'] ?? ""; }
    public function getArray() : array { return $this->_data ?? array(); }
    public function getJSON() : string { return json_encode($this->getArray(),JSON_UNESCAPED_UNICODE) ?? ""; }
}