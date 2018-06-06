<?php

use Dotenv\Dotenv;
use Dotenv\Exception\InvalidFileException;
use Dotenv\Exception\InvalidPathException;

try {
    (new Dotenv($app->basePath(), '.env'))->load();
} catch (InvalidPathException $e) {
    // does nothing...
} catch (InvalidFileException $e) {
    die('The environment file is invalid: '.$e->getMessage());
}
