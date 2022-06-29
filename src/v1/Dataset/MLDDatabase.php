<?php
declare(strict_types=1);
namespace MLCore\v1\Dataset;
class MLDDatabase{
    protected array $_data = array();
    public function __construct(array $databaseConfig = array()) { $this->_data = $databaseConfig ?? array(); return $this; }
    public function name() : string { return $this->_data['name'] ?? ""; }
    public function host() : string { return $this->_data['host'] ?? ""; }
    public function user() : string { return $this->_data['user'] ?? ""; }
    public function pass() : string { return $this->_data['pass'] ?? ""; }
    public function schema() : string { return $this->_data['schema'] ?? ""; }
    public function port() : int { return $this->_data['port'] ?? 3306; }
    public function charset() : string { return $this->_data['charset'] ?? ""; }
    public function getArray() : array { return $this->_data ?? array(); }
    public function getJSON() : string { return json_encode($this->getArray(),JSON_UNESCAPED_UNICODE) ?? ""; }
}