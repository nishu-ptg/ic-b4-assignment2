<?php

// disclaimer: generated using AI

namespace App;

use PDO;
use PDOException;

class DB
{
    /**
     * The singleton instance of PDO
     * @var PDO|null
     */
    private static $instance = null;

    /**
     * Create or return the existing PDO connection
     * @return PDO
     */
    public static function connect(): PDO
    {
        if (self::$instance === null) {
            // Grab database settings from config
            if (php_sapi_name() === 'cli') {
                $configPath = dirname(__DIR__) . '/config.php';
                $allConfigs = require $configPath;
                $config = $allConfigs['database'];
            } else {
                $config = config('database');
            }

            try {
                // Construct the DSN (Data Source Name)
                $dsn = "mysql:host={$config['host']};port={$config['port']};dbname={$config['dbname']};charset={$config['charset']}";

                // Initialize PDO
                self::$instance = new PDO(
                    $dsn,
                    $config['username'],
                    $config['password'],
                    [
                        // Throw exceptions on SQL errors (essential for debugging)
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        // Fetch results as associative arrays by default
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                        // Disable emulated prepares for better security
                        PDO::ATTR_EMULATE_PREPARES => false,
                    ]
                );
            } catch (PDOException $e) {
                // TODO: log this
                if (php_sapi_name() === 'cli') {
                    exit("\n[ERROR] {$e->getMessage()}\n");
                } else {
                    abort(500, $e->getMessage());
                }

            }
        }

        return self::$instance;
    }
}