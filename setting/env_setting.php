<?php
if(file_exists(__DIR__ . '/../.env')) {
    $app->loadEnvironmentFrom('.env');
} elseif(in_array($_SERVER['SERVER_NAME'], ['production'])) {
    $app->loadEnvironmentFrom('.env.production');
} elseif(in_array($_SERVER['SERVER_NAME'], ['staging'])) {
    $app->loadEnvironmentFrom('.env.staging');
} else {
    $app->loadEnvironmentFrom('.env.local');
}