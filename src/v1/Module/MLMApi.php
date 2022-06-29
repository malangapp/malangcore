<?php
declare(strict_types=1);
namespace MLCore\v1\Module;
use MLCore\v1\Dataset\MLDForm;
class MLMApi extends MLDForm {
    public function setField(string $name, $value) : self { $this->_array[$name] = $value ?? null; return $this; }
    public function getField(string $name) { return $this->_array[$name] ?? null; }
    public function setHTTPStatus(int $code) : self { http_response_code($code); return $this; }
}