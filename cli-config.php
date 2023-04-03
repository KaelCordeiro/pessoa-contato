<?php

require __DIR__.'/vendor/autoload.php';
require __DIR__.'/src/EntityManagerFactory.php';

return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet($entityManager);
?>