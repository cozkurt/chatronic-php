<?php

require 'Slim/Slim.php';
require 'mysql_helper.php';

\Slim\Slim::registerAutoloader();

$app = new \Slim\Slim(array(
    'debug' => true
));

$app->get('/hello', function ()
{
    mysqlToJson("SELECT * FROM ofID");
});

$app->run();

?>
