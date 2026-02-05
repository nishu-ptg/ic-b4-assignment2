<?php

namespace App\Controllers;

use App\DB;

class DbController
{
    public static function migrate()
    {
        $db = DB::connect();

        $tableExists = $db->query("SHOW TABLES LIKE 'users'")->rowCount() > 0;

        if ($tableExists) {
            exit("\n[SKIP] Table 'users' already exists. Nothing to migrate.\n");
        }

        $schemaPath = dirname(__DIR__, 2) . '/db_schema.sql';

        if (!file_exists($schemaPath)) {
            exit("\n[ERROR] Schema file missing at: $schemaPath\n");
        }

        $sql = file_get_contents($schemaPath);
        $db->exec($sql);

        echo "\n[SUCCESS] Migration done! Table 'users' created.\n";
    }

    public static function rollback()
    {
        $db = DB::connect();
        $db->exec("DROP TABLE IF EXISTS `users` ");

        echo "\n[SUCCESS] Rollback Successful! Table 'users' dropped.\n";
    }

        public static function refresh()
    {
        self::rollback();
        self::migrate();
        echo "\n[SUCCESS] Database refreshed successfully!\n";
    }
}