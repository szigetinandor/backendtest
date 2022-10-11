<?php
namespace App\DB;

use PDO;
use PDOException;

class PDOConnector {

    private static PDO $instance;

    public static function getInstance() {
        if(empty(self::$instance)) {
            $config = require_once __DIR__.'/../../config/app.php';
            try {
                self::$instance = new PDO("mysql:host=".$config['DB_HOST'].';port='.$config['DB_PORT'].';dbname='.$config['DB_DATABASE'], $config['DB_USER'], $config['DB_PASSWORD']);
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
                self::$instance->query('SET NAMES utf8');
                self::$instance->query('SET CHARACTER SET utf8');
            } catch(PDOException $error) {
                echo $error->getMessage();
            }
        }
        return self::$instance;
    }
}