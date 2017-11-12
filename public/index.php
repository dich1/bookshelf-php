<?php

require_once '/Applications/XAMPP/bookshelf/routes/Router.php';

$router = new Router();
$router->set_system_root('/Applications/XAMPP/bookshelf');
$router->Route();

?>