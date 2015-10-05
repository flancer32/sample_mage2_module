<?php
/**
 * Copyright (c) 2015, Praxigento
 * All rights reserved.
 */
/**
 * Start DB re-creation manually.
 *
 * This script is copied to "test/bin/deploy/install.php"
 *
 * User: Alex Gusev <alex@flancer64.com>
 * User: Vladimir Golobokov <vladimirg@inbox.lv>
 */
set_time_limit(0);
$dbh = new PDO('mysql:host=${CFG_DB_HOST};dbname=${CFG_DB_NAME}', '${CFG_DB_USER}', '${CFG_DB_PASS}');
$dbh->exec("DROP PROCEDURE IF EXISTS `drop_all_tables`;");
$dbh->exec("CREATE PROCEDURE `drop_all_tables`()\n" .
    "BEGIN\n" .
    "DECLARE _done INT DEFAULT FALSE;\n" .
    "DECLARE _tableName VARCHAR(255);\n" .
    "DECLARE _cursor CURSOR FOR\n" .
    "SELECT table_name \n" .
    "FROM information_schema.TABLES \n" .
    "WHERE table_schema = SCHEMA();\n" .
    "DECLARE CONTINUE HANDLER FOR NOT FOUND SET _done = TRUE;\n" .
    "SET FOREIGN_KEY_CHECKS = 0;\n" .
    "OPEN _cursor;\n" .
    "REPEAT FETCH _cursor INTO _tableName;\n" .
    "IF NOT _done THEN\n" .
    "SET @stmt_sql = CONCAT('DROP TABLE ', _tableName);\n" .
    "PREPARE stmt1 FROM @stmt_sql;\n" .
    "EXECUTE stmt1;\n" .
    "DEALLOCATE PREPARE stmt1;\n" .
    "END IF;\n" .
    "UNTIL _done END REPEAT;\n" .
    "CLOSE _cursor;\n" .
    "SET FOREIGN_KEY_CHECKS = 1;\n" .
    "END\n");
$dbh->exec("call drop_all_tables();");
$_SERVER['argv'] = array(
    'Installer.php',
    "--db_host",
    "${CFG_DB_HOST}",
    "--db_name",
    "${CFG_DB_NAME}",
    "--db_user",
    "${CFG_DB_USER}",
    "--db_pass",
    "${CFG_DB_PASS}",
    "--db_prefix",
    "${CFG_DB_PREFIX}",
    "--license_agreement_accepted",
    "${CFG_LICENSE_AGREEMENT_ACCEPTED}",
    "--locale",
    "${CFG_LOCALE}",
    "--timezone",
    "${CFG_TIMEZONE}",
    "--default_currency",
    "${CFG_DEFAULT_CURRENCY}",
    "--url",
    "${CFG_URL}",
    "--use_rewrites",
    "${CFG_USE_REWRITES}",
    "--use_secure",
    "${CFG_USE_SECURE}",
    "--secure_base_url",
    "${CFG_SECURE_BASE_URL}",
    "--admin_frontname",
    "${CFG_ADMIN_FRONTNAME}",
    "--use_secure_admin",
    "${CFG_USE_SECURE_ADMIN}",
    "--admin_lastname",
    "${CFG_ADMIN_LASTNAME}",
    "--admin_firstname",
    "${CFG_ADMIN_FIRSTNAME}",
    "--admin_email",
    "${CFG_ADMIN_EMAIL}",
    "--admin_username",
    "${CFG_ADMIN_USERNAME}",
    "--admin_password",
    "${CFG_ADMIN_PASSWORD}",
    "--skip_url_validation",
    "${CFG_SKIP_URL_VALIDATION}"
);
require '${LOCAL_ROOT}/mage/install.php';