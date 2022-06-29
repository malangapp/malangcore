# malangcore
MalangCore - PHP
```composer require malangapp/malangcore```

---

!Config
```
[Config]
/config/mlc_config.json
/config/mlc_database.json
/config/mlc_error.json
/config/mlc_route.json
```
!Action(PHP)
```
/action/[page-name].php
```
!index.php
```
<?php
use MLCore\v1\MLCore;
include_once "vendor/autoload.php";
$Malang = new MLCore();
$Api = $Malang->API();
$Route = $Malang->Route();
$Config = $Malang->Config();
$Malang->routing();
$Malang->ApiMode();
```
!.htaccess
```
RewriteEngine on
RewriteRule ^(.*)$ index.php?q=$1 [L,QSA]
```