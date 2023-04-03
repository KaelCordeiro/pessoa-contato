<?php

require_once __DIR__.'/../vendor/autoload.php';

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

global $entityManager;

$configuration = Setup::createAnnotationMetadataConfiguration(
    [__DIR__.'/../Model'], 
    true,
    null,
    null,
    false
);

$connection = [
    'dbname' => 'banco',
    'user' => 'root',
    'password' => '123456',
    'host' => 'localhost',
    'port' => '3306',
    'driver' => 'pdo_mysql', 
    'path'   => __DIR__.'/../dataBD/banco.sql',
];

$entityManager = EntityManager::create($connection,$configuration);

?>