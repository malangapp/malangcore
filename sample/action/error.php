<?php
use MLCore\v1\Plugin\MLPError;
global $Malang;
MLPError::NotPage(404 ?? 0,"[Error] Not Found : ".$_SERVER['REDIRECT_URL']);