<?php

require_once '/Applications/XAMPP/bookshelf/vendor/BaseModel.php';
require_once '/Applications/XAMPP/bookshelf/routes/Router.php';

require_once '/Applications/XAMPP/bookshelf/environments/config.php';

$router = new Router();
$router->set_system_root('/Applications/XAMPP/bookshelf');
$router->Route();

?>