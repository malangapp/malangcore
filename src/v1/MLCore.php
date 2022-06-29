<?php
declare(strict_types=1);
namespace MLCore\v1;
use MLCore\v1\Module\MLMApi;
use MLCore\v1\Module\MLMConfig;
use MLCore\v1\Module\MLMRoute;
use MLCore\v1\Plugin\MLPHeader;
class MLCore {
    protected array $_Module = array();
    public function __construct(string $path="./") { return $this->_init($path); }
    protected function _init(string $path) : self { $this->_Module['Config'] = new MLMConfig($path); $this->_Module['Route'] = new MLMRoute(); $this->_Module['Api'] = new MLMApi(); return $this; }
    public function Config() : MLMConfig { return $this->_Module['Config']; }
    public function API() : MLMApi { return $this->_Module['Api'] ?? new MLMApi(); }
    public function Route() : MLMRoute { return $this->_Module['Route'] ?? new MLMRoute(); }
    public function routing() : void { $route = $this->Route()->getArray(); $routeItem = $this->Config()->getRoute($route)->action(); $this->Route()->getPHP("./action/".$routeItem.".php"); }
    public function ApiMode() : void { MLPHeader::setJSONHeader(); echo $this->API()->getJSON(); }
}