<?php
declare(strict_types=1);
namespace MLCore\v1\Module;
use MLCore\v1\Dataset\MLDDatabase;
use MLCore\v1\Plugin\MLPError;
use mysqli;
use mysqli_result;
class MLMDatabase{
    protected MLDDatabase $_config;
    protected mysqli $_connect;
    public function __construct(MLDDatabase $databaseConfig){ $this->_config = $databaseConfig; return $this; }
    protected function Connect() : void { $this->_connect = new mysqli($this->_config->host(),$this->_config->user(),$this->_config->pass(),$this->_config->schema(),$this->_config->port()); if($this->_connect->connect_errno){ MLPError::ErrorStop(701,"[Error] Database Connect Error"); } $this->_connect->set_charset($this->_config->charset()); }
    protected function Close() : void { $this->_connect->close(); }
    public function query(string $query) : ?mysqli_result{ $this->Connect(); $res = $this->_connect->query($query); $this->Close(); if($res === false) return null; return $res; }
    public function db() : ?mysqli { return $this->_connect ?? null; }
    public function getArray() : array { return $this->_config->getArray() ?? array(); }
    public function getJSON() : string { return $this->_config->getJSON() ?? ""; }
}