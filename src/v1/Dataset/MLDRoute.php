<?php
declare(strict_types=1);
namespace MLCore\v1\Dataset;
class MLDRoute{
    protected array $_data = array();
    public function __construct(array $routeConfig = array()) { $this->_data = $routeConfig ?? array(); return $this; }
    public function action() : string { return $this->_data['action'] ?? "error"; }
    public function getArray() : array { return $this->_data ?? array(); }
    public function getJSON() : string { return json_encode($this->getArray(),JSON_UNESCAPED_UNICODE) ?? ""; }
}