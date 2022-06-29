<?php
global $Api,$Route,$Config;
$Api
    ->setHTTPStatus(200)
    ->setCode(200)
    ->setData("list",$Route->getArray());