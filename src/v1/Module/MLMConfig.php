<?php
declare(strict_types=1);
namespace MLCore\v1\Module;
use Error;
use MLCore\v1\Dataset\MLDDatabase;
use MLCore\v1\Dataset\MLDError;
use MLCore\v1\Dataset\MLDRoute;
use MLCore\v1\Plugin\MLPError;
class MLMConfig{
    protected array $_data = array();
    public function __construct(string $path="./") { return $this->_load($path ?? "./"); }
    protected function _load(string $path) : self { $this->_loadConfig($path,"config",901,"[Error] mlc_config.json"); $this->_loadConfig($path,"error",902,"[Error] mlc_error.json"); $this->_loadConfig($path,"route",903,"[Error] mlc_route.json"); $this->_loadConfig($path,"database",904,"[Error] mlc_database.json"); return $this; }
    protected function _loadConfig(string $path, string $name, int $error_code=0, string $error_message="NON") : void{ try { $this->_data[$name] = json_decode(@file_get_contents($path.'/config/mlc_'.$name.'.json') ?? "{}", true) ?? array(); }catch (Error $e){ MLPError::ErrorStop($error_code ?? 0,$error_message ?? "NON"); } }
    public function getMode() : int { return $this->_data['config']['mode'] ?? 0; }
    public function getHost() : int { return $this->_data['config']['host'] ?? 0; }
    public function getDatabase(string $name) : MLDDatabase { if(isset($this->_data['database']["data"][$name])) { return new MLDDatabase($this->_data['database']["data"][$name]); } return  new MLDDatabase(); }
    public function getError(int $code) : MLDError { return new MLDError($this->_data['error']["data"][(string)$code]) ?? new MLDError(); }
    public function getRoute(array $path) : MLDRoute { $error = array("action" => "error"); $tid = $path[1] ?? ""; if(strlen($tid)===0) $tid = "index"; try { if(isset($this->_data['route']["data"][$tid])) { $target = $this->_data['route']["data"][$tid]; for ($i = 2; $i < sizeof($path); $i++) { if (isset($target[$path[$i]])) { $target = $target[$path[$i]]; } else { $target = $error; break; } } }else{ $target = $error; } } catch (Error $e) { $target = $error; } return new MLDRoute($target ?? array()) ?? new MLDRoute(); }
    public function getDatabaseClient(string $name) : MLMDatabase { return new MLMDatabase($this->getDatabase($name) ?? new MLDDatabase()); }
}